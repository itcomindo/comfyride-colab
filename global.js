window.addEventListener('DOMContentLoaded', (event) => {

    WebFont.load({
        google: {
            families: [
                'Mulish:400,700,800,900',
            ]
        },
        active: function () {
            sessionStorage.fonts = true;
            // console.log('fonts loaded semua');
        },
    });




});