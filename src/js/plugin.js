(function($) {
    $.fn.htmlNumberSpinner = function () {

        /* creating the counter buttons */
        $(this).append("<div class='btn spinner decrementer'>-</div> <input class='number-input' type='number'/> <div class='btn spinner incrementer'>+</div>");


        /* default value and variables and jquery elements*/
        var defaultValue = 0, inputValue;
        var numberInput$ = $(this).find('.number-input');
        var incrementerEl$ = $(this).find('.incrementer');
        var decrementerEl$ = $(this).find('.decrementer');

        /* hide the default number input spinner */
        $(this).append("<style>" +
            "input[type=number]::-webkit-inner-spin-button, \n" +
            "input[type=number]::-webkit-outer-spin-button { \n" +
            "    -webkit-appearance: none;\n" +
            "    -moz-appearance: none;\n" +
            "    appearance: none;\n" +
            "    margin: 0; \n" +
            "}</style>");



        /* props - dynamic attributes */
        var minAttributeValue = $(this).attr("min");
        var maxAttributeValue = $(this).attr("max");
        var stepAttributeValue = $(this).attr("step");

        if(minAttributeValue){
            numberInput$.attr("min",+minAttributeValue);
        }

        if(maxAttributeValue){
            numberInput$.attr("max", +maxAttributeValue);
        }

        if(stepAttributeValue){
            numberInput$.attr("step", +stepAttributeValue);
        }


        /* set the default value into the input */
        inputValue = minAttributeValue ? minAttributeValue: defaultValue;
        numberInput$.val(inputValue);

        /* incrementer functionality */
        incrementerEl$.click(function () {
            var parentEl = $(this).parent();
            inputValue = parentEl.find('.number-input').val();
            if(maxAttributeValue){
                if(maxAttributeValue==inputValue){
                    return;
                }
            }
            if(stepAttributeValue){
                inputValue = parentEl.find('.number-input').val();
                parentEl.find('.number-input').val((+inputValue)+(+stepAttributeValue));
                return;
            }
            inputValue = parentEl.find('.number-input').val();
            parentEl.find('.number-input').val(++inputValue);
        });

        /* decrementer functionality */
        decrementerEl$.click(function () {
            var parentEl = $(this).parent();
            inputValue = parentEl.find('.number-input').val();
            if(minAttributeValue){
                if(minAttributeValue==inputValue){
                    return;
                }
            }
            if(stepAttributeValue){
                inputValue = parentEl.find('.number-input').val();
                parentEl.find('.number-input').val((+inputValue)-(+stepAttributeValue));
                return;
            }
            inputValue = parentEl.find('.number-input').val();
            parentEl.find('.number-input').val(--inputValue);
        })

        numberInput$.change(function () {
            if(!maxAttributeValue || !minAttributeValue) return;
            var currentValue = $(this).val();
            if((+currentValue)>(+maxAttributeValue)){
                $(this).val(maxAttributeValue)
                return;
            }
            if((+currentValue)<(+minAttributeValue)){
                $(this).val(minAttributeValue)
                return;
            }
        })

    };

    $.fn.getSpinnerValue = function () {
        return $(this).find('.number-input').val();
    }

}(jQuery));
