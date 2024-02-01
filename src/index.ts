import htmx from 'htmx.org'

/* document.body.addEventListener("htmx:xhr:loadstart",(e)=> {
  console.log(lo);
}) */

/* const essai2=document.querySelector("#essai")?.addEventListener('htmx:xhr:loadstart',(e)=> {
  console.log(e.detail.loaded,'start');
})


const essai=document.querySelector("#span")?.addEventListener('htmx:xhr:progress',(e)=> {
  console.log(e.detail.loaded,'progres');
})

const essai3=document.querySelector("#span")?.addEventListener('htmx:xhr:loadend',(e)=> {
  console.log(e.detail.loaded,'end');
}) */

/* const essai3=document.querySelector("mark")?.addEventListener('htmx:load',(e)=> {
  
  console.log(e,'load');
}) */

/* document.querySelector('#form')?.addEventListener('htmx:xhr:progress',(evt)=> {
  console.log(evt.detail.total * 100)
})
 */

/* const evtSource = new EventSource("http://localhost:8000/form");

evtSource.addEventListener("message", function (event) {
  const newElement = document.createElement("li");
  const time = JSON.parse(event.data).time;
  newElement.textContent = "ping at " + time;
  console.log(newElement);
});

evtSource.addEventListener("error", function (event) {
  console.log('err',event);
  evtSource.close();
});

console.log(evtSource); */





/* function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

sleep(3000)
console.log('okok');


function block() {
  return new Promise((res,rej)=> {
      setTimeout(()=> {
        res('ok')
      },4000)
  })
} */
/* block()
console.log('okok'); */


/* htmx.on('#form', 'htmx:afterRequest', function(evt) {
  console.log(evt)
  
});
 */





/* htmx.on("body", "htmx:xhr:loadstart", function(evt){ console.log(evt.detail.loaded); });
 */