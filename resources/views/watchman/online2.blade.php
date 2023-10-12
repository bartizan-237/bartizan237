<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Bungee&display=swap" rel="stylesheet">

    <style>
        .draw_result {
            font-family: 'Black Han Sans', sans-serif;
        }
    </style>
</head>

<body class="w-full antialiased leading-none">
<div id="toast"><p></p></div>
<!-- <div class="h-full bg-gradient-to-tl from-green-400 to-indigo-900 w-full py-16 px-4"> -->
<div class="w-full py-4 px-4 pb-8">
    <div id="step_app" style="max-width: 500px; margin: auto" >
        <div>
            <div class="flex flex-wrap p-3 items-center justify-center">
                {{--                <button--}}
                {{--                        @click="prevStep"--}}
                {{--                        :disabled="currentStep === 0"--}}
                {{--                        class="flex text-green-600 ml-2 mr-2 items-center justify-center w-1/5 h-10 border-2 border-green-600 rounded-full"--}}
                {{--                >--}}
                {{--                    <--}}
                {{--                </button>--}}
                <div
                        v-for="(step, index) in steps"
                        :key="index"
                        :class="{ 'bg-green-600 text-white': currentStep === index }"
                        class="flex text-green-600 items-center justify-center w-1/3 h-10 border-green-600" style="border-bottom: 1px solid #138237"
                        v-text="step"
                >
                </div>
                {{--                <button--}}
                {{--                        @click="nextStep"--}}
                {{--                        :disabled="currentStep === steps.length - 1"--}}
                {{--                        class="flex text-green-600 ml-2 mr-2 items-center justify-center w-1/5 h-10 border-2 border-green-600 rounded-full"--}}
                {{--                >--}}
                {{--                    >--}}
                {{--                </button>--}}
            </div>


        </div>

        <div class="w-full h-128">
            <div v-if="currentStep == 0">
                <div class="mb-6">
                    <label id="name" class="text-base font-medium leading-none text-gray-900">
                        이름을 입력해주세요
                    </label>
                    <input type="text" name="name" v-model="name" class="bg-gray-200 border rounded text-lg font-medium leading-none text-gray-900 p-2 w-full pl-3 mt-2"/>
                    <p class="text-red-700 my-1 text-xs">* 교인 중 동명이인이 있으신 경우, 이름을 정확하게 표기해주세요.<br/> 예시) 김다윗A, 박바울B</p>
                </div>
                <div class="mb-6">
                    <label id="district" class="text-base font-medium leading-none text-gray-900">
                        소속되어 있는 권역 또는 지교회를 입력해주세요
                    </label>
                    <input type="text" name="district" v-model="district" class="bg-gray-200 border rounded  text-lg font-medium leading-none text-gray-900 p-2 w-full pl-3 mt-2"/>
                    <p class="text-red-700 my-1 text-xs">* 본교회에 출석하시는 분은 권역명을, 지교회에 출석하시는 분은 지교회명을 입력해주세요.<br/> 예시) 영도, 동래, 시외 또는 해운대지교회, 창원지교회, 거제지교회, ...</p>
                </div>
                <div class="mb-6">
                    <label id="position" class="text-base font-medium leading-none text-gray-900">
                        직분을 선택해주세요.
                    </label>
                    <p class="text-red-700 my-1 text-xs">* 지금 직분을 선택해주세요.</p>
                    <div>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="장로" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            장로
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="권사" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            권사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="안수집사" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            안수집사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="렘넌트" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            렘넌트
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="성도" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            성도(집사)
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <label id="position2" class="text-base font-medium leading-none text-gray-900">
                        11월 12일 임직 예정이신 분들은 <b>임직예정직분</b>을 선택해주세요.
                    </label>
                    <p class="text-red-700 my-1 text-xs">* 11월 12일 임직식에서 임직이 예정되어있으신 분만 체크해주시기 바랍니다.</p>
                    <div>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position2" v-model="position2" value="장로" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            장로
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position2" v-model="position2" value="권사" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            권사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position2" v-model="position2" value="안수집사" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            안수집사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position2" v-model="position2" value="렘넌트" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            렘넌트
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position2" v-model="position2" value="성도" class="bg-gray-200 border rounded  text-sm font-medium leading-none text-gray-900 p-2"/>
                            성도(집사)
                        </label>
                    </div>
                </div>

                <button
                        @click="goToNextStep(1)"
                        class="px-3 py-2 text-white text-lg bg-green-600 rounded"
                >
                    다음으로
                </button>
            </div>
            <div v-if="currentStep == 1" class="text-center">
                <!-- 빈곳작정 제비뽑기 -->
                <div class="relative w-64 items-center justify-center mx-auto">
                    <p class="text-base text-gray-900">
                        237 나라 중에서<br/>
                        <span v-text="position" class="text-2xl font-bold text-gray-900"></span> 직분이 비어있는 나라의 수
                    </p>
                    <p v-text="emptyCount" class="my-6 flex items-center justify-center text-green-600" style="font-size: 50px; font-family: 'Bungee', cursive"></p>
                </div>

                <button
                        @click="goToNextStep(2)"
                        class="px-3 py-2 text-white mt-6 text-lg bg-green-600 rounded"
                >

                    <svg fill="#FFF" width="40px" height="40px" viewBox="0 0 32 32" style="display: inline-block">
                        <path d="M15.676 17.312h0.048c-0.114-0.273-0.263-0.539-0.436-0.78l-11.114-6.346c-0.37 0.13-0.607 0.519-0.607 1.109v9.84c0 1.034 0.726 2.291 1.621 2.808l9.168 5.294c0.544 0.314 1.026 0.282 1.32-0.023v-11.902h-0zM10.049 24.234l-1.83-1.057v-1.918l1.83 1.057v1.918zM11.605 19.993c-0.132 0.2-0.357 0.369-0.674 0.505l-0.324 0.12c-0.23 0.090-0.38 0.183-0.451 0.278-0.071 0.092-0.106 0.219-0.106 0.38v0.242l-1.83-1.056v-0.264c0-0.294 0.056-0.523 0.167-0.685 0.111-0.165 0.346-0.321 0.705-0.466l0.324-0.125c0.193-0.076 0.333-0.171 0.421-0.285 0.091-0.113 0.137-0.251 0.137-0.417 0-0.251-0.081-0.494-0.243-0.728-0.162-0.237-0.389-0.44-0.679-0.608-0.274-0.158-0.569-0.268-0.887-0.329-0.318-0.065-0.649-0.078-0.994-0.040v-1.691c0.409 0.085 0.782 0.19 1.12 0.313s0.664 0.276 0.978 0.457c0.825 0.476 1.453 1.019 1.886 1.627 0.433 0.605 0.649 1.251 0.649 1.937 0 0.352-0.066 0.63-0.198 0.834zM27.111 8.247l-9.531-5.514c-0.895-0.518-2.346-0.518-3.241 0l-9.531 5.514c-0.763 0.442-0.875 1.117-0.336 1.628l10.578 6.040c0.583 0.146 1.25 0.145 1.832-0.003l10.589-6.060c0.512-0.508 0.392-1.17-0.36-1.605zM16.305 10.417l-0.23-0.129c-0.257-0.144-0.421-0.307-0.492-0.488-0.074-0.183-0.062-0.474 0.037-0.874l0.095-0.359c0.055-0.214 0.061-0.389 0.016-0.525-0.041-0.139-0.133-0.248-0.277-0.329-0.219-0.123-0.482-0.167-0.788-0.133-0.309 0.033-0.628 0.141-0.958 0.326-0.31 0.174-0.592 0.391-0.846 0.653-0.257 0.26-0.477 0.557-0.661 0.892l-1.476-0.827c0.332-0.333 0.658-0.625 0.978-0.875s0.659-0.474 1.015-0.674c0.934-0.524 1.803-0.835 2.607-0.934 0.8-0.101 1.5 0.016 2.098 0.352 0.307 0.172 0.508 0.368 0.603 0.589 0.092 0.219 0.097 0.507 0.016 0.865l-0.1 0.356c-0.066 0.255-0.080 0.438-0.041 0.55 0.035 0.11 0.124 0.205 0.265 0.284l0.212 0.118-2.074 1.162zM18.674 11.744l-1.673-0.937 2.074-1.162 1.673 0.937-2.074 1.162zM27.747 10.174l-11.060 6.329c-0.183 0.25-0.34 0.527-0.459 0.813v11.84c0.287 0.358 0.793 0.414 1.37 0.081l9.168-5.294c0.895-0.517 1.621-1.774 1.621-2.808v-9.84c0-0.608-0.251-1.003-0.641-1.121zM23.147 23.68l-1.83 1.056v-1.918l1.83-1.057v1.918zM24.703 17.643c-0.132 0.353-0.357 0.78-0.674 1.284l-0.324 0.494c-0.23 0.355-0.38 0.622-0.451 0.799-0.071 0.174-0.106 0.342-0.106 0.503v0.242l-1.83 1.056v-0.264c0-0.294 0.056-0.587 0.167-0.878 0.111-0.294 0.346-0.721 0.705-1.279l0.324-0.5c0.193-0.298 0.333-0.555 0.421-0.771 0.091-0.218 0.137-0.409 0.137-0.575 0-0.251-0.081-0.4-0.243-0.447-0.162-0.050-0.389 0.009-0.679 0.177-0.274 0.158-0.569 0.39-0.887 0.695-0.318 0.302-0.649 0.671-0.994 1.107v-1.692c0.409-0.387 0.782-0.714 1.12-0.981s0.664-0.491 0.978-0.673c0.825-0.476 1.453-0.659 1.886-0.55 0.433 0.106 0.649 0.502 0.649 1.188 0 0.352-0.066 0.706-0.198 1.062z"></path>
                    </svg>
                    빈 곳 작정 제비 뽑기
                </button>
            </div>
            <div v-if="currentStep == 2" class="w-full">
                <!-- 제비뽑기 결과 -->
                <div v-if="loading == 1" class="relative w-64 h-64 flex items-center justify-center mx-auto text-center">
                    <p class="text-sm text-gray-900 absolute" style="top:0px; z-index: 11;" >
                        <span v-text="position" class="text-lg font-bold text-gray-900"></span> 직분으로
                        <br/>작정할 수 있는 나라를 찾고있습니다<span v-text="dots"></span>
                    </p>

                    <img class="absolute inset-0 w-full h-full object-cover" src="/image/loading.gif">
                    <p v-text="countDown" class="z-10 absolute inset-0 flex items-center justify-center text-green-600" style="font-size: 60px; -webkit-text-stroke: 1px white; text-stroke:1px white; font-family: 'Bungee', cursive"></p>
                </div>
                <div v-else class="relative w-full text-center">
                    <p class="text-lg text-gray-900 " >
                        <span class="block my-3" style="font-size: 20px">축하드립니다🎉</span>
                        <span v-text="draw_result" class="draw_result my-8 block text-green-600" style="font-size: 40px"></span>
                        <span v-text="name" class="text-base font-bold text-gray-900"></span> <span v-text="position" class="text-base font-bold text-gray-900"></span>님의 <br/> <b>빈 곳 작정 제비뽑기</b> 결과입니다!
                    </p>

                    <div class="mt-6" style="background: rgb(238, 238, 238); padding: 30px 40px; color: rgb(85, 85, 85); border-radius: 10px; text-align: left">
                        <ul>
                            <li style="list-style: disc; font-size: 15px; line-height: 25px;">
                                빈 곳 작정 제비뽑기 결과는 교회 주보의 <b>237나라 작정현황표</b>에 반영됩니다.
                            </li>
                            <li style="list-style: disc; font-size: 15px; line-height: 25px;">
                                제비뽑기 결과 화면을 캡쳐하셔서 보관해주세요.
                            </li>
                            <li style="list-style: disc; font-size: 15px; line-height: 25px;">
                                세계망대와 관련된 문의사항은 우측 하단의 <b>카카오톡</b>으로 문의해주시기 바랍니다.
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<img id="kakao_btn" src="/image/kakaotalk.png" width="50" height="50" style="display: block; right: 20px; bottom: 20px; position: fixed; z-index: 9999999; cursor: pointer; opacity: 1;">

</body>



<script src="/js/kakao.js"></script>
{{--<script src="{{ asset('js/watchman/step.js') }}" defer></script>--}}
<script>
    const stepApp = new Vue({
        el : "#step_app",
        data : {
            name : null,
            position : null,
            district : null,
            loading : 1,
            countDown: 10,
            emptyCount : 0,
            draw_result : null,
            currentStep: 0,
            dots : ".",
            steps: ['기본 정보', '빈 곳', '결과'],
            pledgeType : 'random',
        },
        mounted : function() {
            console.log("MOUNTED", this._data.currentStep, this._data.steps);
            setInterval(() => {
                if(this._data.dots == "."){
                    this._data.dots = "..";
                } else if (this._data.dots == ".."){
                    this._data.dots = "...";
                } else {
                    this._data.dots = ".";
                }

            }, 1000);
        },
        methods: {
            validateMemberInfo : async function() {
                // return true;
                return new Promise(resolve => {
                    let name = this._data.name;
                    if(name == null || name == ""){
                        toast("warning", "이름을 다시 확인해주세요.");
                        resolve(false);
                    }
                    let district = this._data.district;
                    let position = this._data.position;
                    if(position == null || position == ""){
                        toast("warning", "직분을 꼭 선택해주세요");
                        resolve(false);
                    }


                    axios.post('/online/validate',
                        {
                            name : name,
                            district : district,
                            position : position,
                        },
                        {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(res => {
                            console.log("response", res);
                            if(res.data.code == 200){
                                toast("success", "빈곳 작정 제비뽑기를 시작합니다");
                                setTimeout(function () {
                                    resolve(true);
                                }, 1000)
                            }else if(res.data.code == 301){
                                let already_nation = res.data.nation_name;
                                toast("warning", `${name} ${position}님은 이미 작정하셨습니다.<br/>작정은 한 나라에 1번만 하실 수 있습니다.<br/><br/>작정하셨던 나라 : ${already_nation}`);
                                resolve(false);
                            }else{
                                toast("warning", "서버에 일시적인 오류가 발생했습니다🥲 <br/>잠시 후에 다시 시도해주시기 바랍니다");
                                resolve(false);
                            }
                        });
                });
            },
            goToNextStep : async function (step_to_go) {
                if(step_to_go == 1){
                    // 0 -> 1
                    // 검증

                    let validation = await this.validateMemberInfo();
                    console.log("validation", validation);
                    if(validation){
                        this._data.currentStep = 1;
                        this.getEmptyCount();
                    } else {
                        this._data.currentStep = 0;
                    }
                } else if (step_to_go == 2){
                    // 1 -> 2
                    // 검증
                    let name = this._data.name;
                    let position = this._data.position;

                    let confirm_msg = `${name} ${position}님, 빈 곳 작정 제비뽑기를 진행하시겠습니까?\n\n한번 작정하신 나라는 변경하실 수 잆습니다.\n237나라를 세계망대에 작정하실 준비가 되셨다면 확인 버튼을 클릭해주세요.`;
                    if(!confirm(confirm_msg)) return false;


                    let draw_success = this.drawPledge();
                    if(draw_success){
                        this._data.currentStep = 2;
                        this.countDownTimer();
                    } else {
                        alert("일시적인 오류가 발생했습니다.\n잠시 후에 다시 시도해주시기 바랍니다.");
                    }

                } else {
                    return false;
                }
            },
            drawPledge : async function() {
                // 제비뽑기 실행
                return new Promise(resolve => {
                    let name = this._data.name;
                    let district = this._data.district;
                    let position = this._data.position;

                    axios.post('/online/pledge',
                        {
                            name : name,
                            district : district,
                            position : position,
                        },
                        {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(res => {
                            console.log("response", res);
                            if(res.data.success){
                                // 빈 곳 작정 성공
                                this._data.draw_result = res.data.nation_name;
                                resolve(true);
                            }else {
                                alert("warning", "제비를 뽑는 중 서버에 일시적인 오류가 발생했습니다<br/>잠시 후에 다시 시도해주시기 바랍니다");
                                location.reload();
                                // resolve(false);
                            }
                        });
                });
            },
            countDownTimer : function() {
                console.log("countDownTimer");
                if (this._data.countDown > 0) {
                    setInterval(() => {
                        if (this._data.countDown > 0) {
                            this._data.countDown -= 1; // loading
                        } else {
                            this._data.loading = 0; // end loading
                        }
                    }, 1000);
                }
            },
            getEmptyCount() {
                let target_url = "/online/empty?position=" + this._data.position;
                axios.get(target_url)
                    .then((response) => {
                        console.log("response",response);
                        this._data.emptyCount = response.data.count;
                    }).catch(function (error) {
                    console.log("error", error);
                    return false;
                });
            },
            nextStep : async function () {
                console.log("nextStep");
                if (this._data.currentStep < this._data.steps.length - 1) {
                    this._data.currentStep++;
                    if(this._data.currentStep == 1){
                        let validation = await this.validateMemberInfo();
                        if(validation){
                            this.getEmptyCount();
                        } else {
                            this._data.currentStep = 0;
                        }
                    }

                    if(this._data.currentStep == 2){
                        this.countDownTimer();
                    }
                }
            },
            prevStep : function () {
                console.log("prevStep");
                if (this._data.currentStep > 0) {
                    this._data.currentStep--;
                }
            },
        },
    });

    Kakao.init('3c4a188cc468f3aa4bf9d81e688cc78d');


    document.getElementById('kakao_btn').addEventListener('click', function() {
        Kakao.Channel.chat({
            channelPublicId: '_xdcxmsxb' // 카카오톡 채널 홈 URL에 명시된 id로 설정합니다.
        });
    });
</script>

</html>
