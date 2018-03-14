
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

paypal.Button.render({

    env: 'sandbox', // sandbox | production

    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
        sandbox:    'AaJ4Tw-7uonIWB1AFPkmthZM4d1nwV00SryrvaiVsjeWigVbBejQqOsk5b2DsEDojtzH7cIzeHbftZPN',
        production: ''
    },

    // Show the buyer a 'Pay Now' button in the checkout flow
    commit: true,

    // payment() is called when the button is clicked
    payment: function(data, actions) {

        // Make a call to the REST api to create the payment
        return actions.payment.create({
            payer: {
                payer_info: {
                    email: document.getElementById("paiement-email").innerHTML,
                    first_name: document.getElementById("paiement-nom").innerHTML,
                    last_name: document.getElementById("paiement-prenom").innerHTML
                }
            },
            payment: {
                transactions: [
                    {
                        amount: { total: '5.00', currency: 'EUR' }
                    }
                ]
            },
            experience: {
                name: 'Animepedia Abonnement',
                presentation: {
                    brand_name: 'Animepedia PayPal',
                    locale_code: 'FR',
                    logo_image: 'https://animepedia.fr'
                },
                input_fields: {
                    no_shipping: 1
                }
            }
        });
    },

    // onAuthorize() is called when the buyer approves the payment
    onAuthorize: function(data, actions) {

        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {
            //window.alert('Payment Complete!');
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("page-wizard").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","https://dev.animepedia.fr/controleur/ControleurWizard.php?paiementID=" + data.paymentID,true);
            xmlhttp.send();
        });
    }

}, '#paypal-button');