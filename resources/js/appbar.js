console.log("APPBAR.JS");
const app = new Vue({
    el : "#app",
    data: {
        menu_open : false
    },
    mounted: function(){

    },
    methods: {
        toggleMenu : function (){
            this.menu_open = !this.menu_open;
            console.log("toggleMenu", this.menu_open);
        }
    }
});
