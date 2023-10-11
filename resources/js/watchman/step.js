
const stepApp = new Vue({
    el : "step_app",
    data() {
        return {
            currentStep: 1,
            steps: ['Step 1', 'Step 2', 'Step 3'],
        };
    },
    mounted : () => {
        console.log("MOUNTED");
    },
    methods: {
        nextStep() {
            console.log("nextStep");
            if (this.currentStep < this.steps.length - 1) {
                this.currentStep++;
            }
        },
        prevStep() {
            console.log("prevStep");
            if (this.currentStep > 0) {
                this.currentStep--;
            }
        },
    },
});