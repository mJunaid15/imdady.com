
let month =document.getElementById('customRadioInline1');
let year =document.getElementById('customRadioInline2');

// alert(year)
    function getSelectValue() {
      var selectedValue = document.getElementById("list").value;
      // alert(selectedValue);
      if (selectedValue == "Plug n Play" && month.checked ) {

        let number = 190;
        var percentToGet = 15;
        var percent = (percentToGet / 100) * number;
        let totals = document.getElementById('gTotal');
        totals.innerHTML = `${number} sar`;

        let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
        let subtotal = document.getElementById("subTotal").innerHTML = `${number -28.5} sar`;
        




      } else if (selectedValue == "Plug n Play" && year.checked) {

        let number = 1900;

        var percentToGet = 15;

        var percent = (percentToGet / 100) * number;
        let totals = document.getElementById('gTotal');
        totals.innerHTML = `${number} sar`;

        let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
        let subtotal = document.getElementById("subTotal").innerHTML = `${number-285} sar`;


      } else if(selectedValue == "Advance Setup" && month.checked) {
             
             let number = 240;
           
           var percentToGet = 15;
         
           var percent = (percentToGet / 100) * number;
           let totals = document.getElementById('gTotal');
           totals.innerHTML = `${number} sar`;
         
           let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
           let subtotal = document.getElementById("subTotal").innerHTML = `${number-36} sar`;
             
               
          }else if(selectedValue == "Advance Setup" && year.checked) {
             
             let number = 2400;
           
           var percentToGet = 15;
         
           var percent = (percentToGet / 100) * number;
           let totals = document.getElementById('gTotal');
           totals.innerHTML = `${number} sar`;
         
           let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
           let subtotal = document.getElementById("subTotal").innerHTML = `${number -360} sar`;
             
               
          }else if(selectedValue == "Easy Go" && month.checked) {
             
             let number = 120;
           
           var percentToGet = 15;
         
           var percent = (percentToGet / 100) * number;
           let totals = document.getElementById('gTotal');
           totals.innerHTML = `${number} sar`;
         
           let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
           let subtotal = document.getElementById("subTotal").innerHTML = `${number-18} sar`;
             
               
          } else if(selectedValue == "Easy Go" && year.checked) {
             
             let number = 1190;
           
           var percentToGet = 15;
         
           var percent = (percentToGet / 100) * number;
           let totals = document.getElementById('gTotal');
           totals.innerHTML = `${number} sar`;
         
           let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
           let subtotal = document.getElementById("subTotal").innerHTML = `${number-178.5} sar`;
           console.log(document.getElementById("subTotal").value) 
             
               
          }  else {

        let number = 120;

        var percentToGet = 15;

        var percent = (percentToGet / 100) * number;
        let totals = document.getElementById('gTotal');
        totals.innerHTML = `${number} sar`;

        let vat = document.getElementById('vat').innerHTML = `${percent} sar`;
        let subtotal = document.getElementById("subTotal").innerHTML = `${number} sar`;
        
       

      }
    }
    getSelectValue();

    


