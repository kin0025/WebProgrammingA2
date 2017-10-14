    /* global localStorage */
        function itemModified(element,cost){
            calculateTotal();
            calculateSubTotal(element,cost);
            saveCart(element);
        }
        function saveCart(element){
            if(typeof(Storage) !== "undefined"){
                localStorage.setItem(element.id, element.value);
            }
        }
        function loadCart(){
            if(typeof(Storage) !== "undefined"){
                if(localStorage.s1amount != null){
                document.getElementById('s1amount').value = Number(localStorage.s1amount);
                }
                if(localStorage.s2amount != null){
                document.getElementById('s2amount').value = Number(localStorage.s2amount);
                }
                if(localStorage.s3amount != null){
                document.getElementById('s3amount').value = Number(localStorage.s3amount);
                }
                
            }
        }
        function calculateTotal() {
            var totalElement = document.getElementById('total');
            var counts1 = document.getElementById('s1amount').value;
            var counts2 = document.getElementById('s2amount').value;

            var counts3 = document.getElementById('s3amount').value;

            var total = (counts1 * 17) + (counts2 * 22.5) + (counts3 * 26.75);

            totalElement.value = "$" + total.toFixed(2);
        }

        function calculateSubTotal(element, cost) {
            var elementID = element.id;
            var subtotal;
            var total = element.value * cost;

            switch (elementID.charAt(1)) {
                case '1':
                    subtotal = document.getElementById('s1total');
                    break;
                case '2':
                    subtotal = document.getElementById('s2total');
                    break;
                case '3':
                    subtotal = document.getElementById('s3total');
                    break;
            }

            subtotal.value = "$" + total.toFixed(2);
        }
        
