
        function incrementValue() {
            // Get the input element
            var textBox = document.getElementById('number');
            var price = document.getElementById('price').innerHTML;

            // Get the current value and convert it to a number
            var currentValue = parseFloat(textBox.value);

            // Check if the value is a valid number
            if (!isNaN(currentValue)) {
                // Increment the value by 1
                textBox.value = currentValue + 1;
                
            } else {
                // If the value is not a number, set it to 1
                textBox.value = 1;
            }
        }