<div class="w-full mb-2 ">
    <div class="px-4">
        <div class="w-full mx-auto">
            <div class="flex justify-between flex-col">
                <div class="mb-8 text-center">
                    <h2 class="font-medium text-xl leading-5 text-gray-800 mb-4">세계망대 Q&A</h2>
                </div>
            </div>
        </div>
        <div class="w-full mx-auto">
            <!-- Question 1 -->
            @foreach($faqs as $i => $faq)
            <hr class="w-full my-8" />
            <div class="w-full md:px-6">
                <div id="mainHeading" class="flex justify-between items-center w-full">
                    <div class="">
                        <p class="flex justify-center items-center font-medium text-base leading-6 text-gray-800">
                            <span class="mr-4 text-lg leading-6 font-semibold text-gray-800">
                                Q{{$i+1}}.
                            </span>
                            {{$faq['question']}}
                        </p>
                    </div>
                    <button aria-label="toggler" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" data-menu>
                        <img class="transform " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/faq-8-svg2.svg" alt="toggler">
                        <img class="transform hidden " src="https://tuk-cdn.s3.amazonaws.com/can-uploader/faq-8-svg2dark.svg" alt="toggler">
                    </button>
                </div>
                <div id="menu" class="hidden mt-6 w-full">
                    <p class="text-base leading-6 text-gray-600 font-normal">
                        {{$faq['answer']}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>

<script>
    let elements = document.querySelectorAll("[data-menu]");
    for (let i = 0; i < elements.length; i++) {
        let main = elements[i];

        main.addEventListener("click", function () {
            let element = main.parentElement.parentElement;
            let indicators = main.querySelectorAll("img");
            let child = element.querySelector("#menu");
            let h = element.querySelector("#mainHeading>div>p");

            h.classList.toggle("font-semibold");
            child.classList.toggle("hidden");
            // console.log(indicators[0]);
            indicators[0].classList.toggle("rotate-180");
        });
    }
</script>