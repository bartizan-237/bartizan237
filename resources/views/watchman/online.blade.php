<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("layouts.html_head")
    <link href="https://fonts.googleapis.com/css2?family=Bungee&amp;display=swap" rel="stylesheet">
</head>

<body class="w-full h-screen antialiased leading-none">
<div id="toast"><p></p></div>
<!-- <div class="h-full bg-gradient-to-tl from-green-400 to-indigo-900 w-full py-16 px-4"> -->
<div class="h-full w-full py-16 px-4">
    <div id="step_app" style="max-width: 500px; margin: auto" >
        <div>
            <div class="flex flex-wrap p-3 items-center justify-center">
                <button
                        @click="prevStep"
                        :disabled="currentStep === 0"
                        class="flex text-blue-500 ml-2 mr-2 items-center justify-center w-10 h-10 border-2 border-blue-500 rounded-full"
                >
                    <
                </button>
                <div
                        v-for="(step, index) in steps"
                        :key="index"
                        :class="{ 'bg-blue-500 text-white': currentStep === index }"
                        class="flex text-blue-500 ml-2 mr-2 items-center justify-center w-10 h-10 border-2 border-blue-500 rounded-full"
                        v-text="step"
                >
                </div>
                <button
                        @click="nextStep"
                        :disabled="currentStep === steps.length - 1"
                        class="flex text-blue-500 ml-2 mr-2 items-center justify-center w-10 h-10 border-2 border-blue-500 rounded-full"
                >
                    >
                </button>
            </div>


        </div>

        <div class="w-full h-128">
            <div v-if="currentStep == 0">
                <div class="mb-6">
                    <label id="name" class="text-sm font-medium leading-none text-gray-900">
                        이름을 입력해주세요
                    </label>
                    <input type="text" name="name" v-model="name" class="bg-gray-200 border rounded text-xs font-medium leading-none text-gray-900 py-3 w-full pl-3 mt-2"/>
                    <p class="text-gray-700 my-1 text-xs">* 교인 중 동명이인이 있으신 경우, 이름을 정확하게 표기해주세요.<br/> 예시) 김다윗A, 박바울B</p>
                </div>
                <div class="mb-6">
                    <label id="district" class="text-sm font-medium leading-none text-gray-900">
                        소속되어 있는 권역 또는 지교회를 입력해주세요
                    </label>
                    <input type="text" name="district" v-model="district" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 py-3 w-full pl-3 mt-2"/>
                    <p class="text-gray-700 my-1 text-xs">* 본교회에 출석하시는 분은 권역명을, 지교회에 출석하시는 분은 지교회명을 입력해주세요.<br/> 예시) 영도, 동래, 시외, 해운대지교회, 창원지교회, 거제지교회, ...</p>
                </div>
                <div class="mb-6">
                    <label id="position" class="text-sm font-medium leading-none text-gray-900">
                        직분을 선택해주세요.
                    </label>
                    <p class="text-gray-700 my-1 text-xs">* 11월 12일 임직식에서 임직이 예정되어있으신 분은 임직예정직분에 체크해주세요.</p>
                    <div>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="장로" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 p-2"/>
                            장로
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="권사" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 p-2"/>
                            권사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="안수집사" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 p-2"/>
                            안수집사
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="RT" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 p-2"/>
                            렘넌트
                        </label>
                        <label class="ml-2 my-2 block ">
                            <input type="radio" name="position" v-model="position" value="성도" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-900 p-2"/>
                            성도
                        </label>
                    </div>

                </div>

                <button
                        @click="goToNextStep(1)"
                        class="px-3 py-2 text-white text-lg bg-blue-500 rounded"
                >
                    다음
                </button>
            </div>
            <div v-if="currentStep == 1" class="text-center">
                <!-- 빈곳작정 제비뽑기 -->
                <p class="text-sm text-gray-700">현재 237 나라 중 <span v-text="position" class="text-base font-bold text-gray-900"></span> 직분의 빈 나라 수</p>
                <p v-text="emptyCount" class="z-10 absolute inset-0 flex items-center justify-center text-blue-500" style="font-size: 50px; font-family: 'Bungee', cursive"></p>
            </div>
            <div v-if="currentStep == 2">
                <!-- 제비뽑기 결과 -->
                <div v-if="loading == 1" class="relative w-64 h-64 flex items-center justify-center mx-auto">
                    <img class="absolute inset-0 w-full h-full object-cover" src="/image/loading.gif">
                    <p v-text="countDown" class="z-10 absolute inset-0 flex items-center justify-center text-blue-500" style="font-size: 50px; font-family: 'Bungee', cursive"></p>
                </div>
                <div v-else class="relative w-64 h-64">
                    결 과!
                    <p v-text="draw_result" class="absolute inset-0 flex items-center justify-center text-white text-xl"></p>
                </div>
            </div>
        </div>

    </div>
</div>


</body>

{{--<script src="{{ asset('js/watchman/step.js') }}" defer></script>--}}
<script>
    const stepApp = new Vue({
        el : "#step_app",
        data : {
            name : null,
            position : null,
            district : null,
            loading : 1,
            countDown: 7,
            emptyCount : 0,
            draw_result : null,
            currentStep: 0,
            steps: ['기본 정보', '작정 방법', '나라 선택'],
            pledgeType : 'random',
        },
        mounted : function() {
           console.log("MOUNTED", this._data.currentStep, this._data.steps);
        },
        methods: {
            validateMemberInfo : async function() {

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
                                resolve(true);
                            }else if(res.data.code == 301){
                                let already_nation = res.data.nation_name;
                                toast("warning", `${name} ${position}님은 이미 작정하셨습니다. 작정은 한 나라에 1번만 하실 수 있습니다.<br/><br/>작정하셨던 나라 : ${already_nation}`);
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

                    this._data.currentStep = 2;
                    this.countDownTimer();
                } else {
                    return false;
                }
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
</script>

</html>
