// let prestation  = document.querySelector('#prestation1');
// prestation.addEventListener('click', function() {
//     let val = this.options[this.selectedIndex].value;
//     var httpRequest = new XMLHttpRequest();
//     httpRequest.onreadystatechange = () => {
//         if (httpRequest.readyState === 4) {

//             if(httpRequest.status === 200) {

//                 let results = JSON.parse(httpRequest.responseText);
//                 let result = document.getElementById('sprestation');
//                 result.innerHTML = '<option value="0">- Aucune -</option>';

//                 for(var j=0; j<results.length; j++){
//                     var options = document.createElement('option');

//                     options.value = results[j][1];
//                     options.text = results[j][0];
//                     result.appendChild(options);
//                 }
//             }
//         }
//     }
//     httpRequest.open('GET', 'index.php?action=<?= $action ?>&saction=Ajax&ssaction='+val, true);
//     httpRequest.send();
// })

// let post = document.querySelector('#post');
// let href = post.getAttribute('href');

// post.addEventListener('click', (e) => {
//     e.preventDefault();
//     var httpRequest = new XMLHttpRequest();
//     httpRequest.onreadystatechange = () => {
//         if (httpRequest.readyState === 4) {

//             if(httpRequest.status === 200) {

//                 // let results = JSON.parse(httpRequest.responseText);
//                 // alert('bonjour');
//                 let div = document.getElementById('btnPostuler');
//                 div.innerHTML = httpRequest.responseText;
//             }
//         }
//     }
//     httpRequest.open('GET', href, true);
//     httpRequest.send();
// });
