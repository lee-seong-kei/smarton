(function () {
    const DeployStrategy = function () {
        function DeployStrategy() {
            this.accesstype = '';
            this.features = [];
            this.syncTime = 0;
            this.isUpdating = false;
            /** 동기화 주기 (밀리초 단위) */
            this.syncPeriod = 60000;
        }

        DeployStrategy.prototype.init = function (options) {
            this.accesstype = options.accesstype;
            this.features = options.features;
            this.syncPeriod = options.syncPeriod || 60000; // 동기화 주기 (밀리초 단위)
            this.syncTime = Date.now();
        }

        DeployStrategy.prototype.isSiteEnabled = async function (feature_key) {
            // 1분( 60000 밀리초 ) 이 지나면 최신화
            if (this.syncTime === 0 || Date.now() - this.syncTime > this.syncPeriod) {
                await this.updateFeatures();
            }
            return this.features[feature_key] || false;
        }

        DeployStrategy.prototype.getFeatures = async function () {
            try {
                let url;
                switch (this.accesstype) {
                    case 'IO':
                        url = '';
                        break;
                    case 'BO':
                        url = '';
                        break;
                    case 'FO':
                    default:
                        url = '';
                        break;
                }
                const response = await fetch(url);
                if (!response.ok) throw new Error(`서버 응답 오류 (상태 코드: ${response.status})`);
                const result = await response.json();
                if (result.msg !== "SUCCESS") throw new Error(result.msg);
                return result.features;
            } catch (error) {
                console.error('기능 목록을 가져오는 중 오류 발생:', error);
                // 에러가 발생했다면 기존의 feature 값을 그대로 사용한다.
                return this.features;
            }
        }

        DeployStrategy.prototype.updateFeatures = async function () {
            if (!this.isUpdating) {
                this.isUpdating = true;
                this.features = await this.getFeatures();
                this.syncTime = Date.now();
                this.isUpdating = false;
            }
        }

        return DeployStrategy;
    }();

    window.DeployStrategy = new DeployStrategy();
})();
