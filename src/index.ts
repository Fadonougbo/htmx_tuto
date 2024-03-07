import htmx from 'htmx.org'

/* 
  mon idee serait de detecter la page sur laquel on n'est grace au header HShow que j'ai definie et ensuite ajuster 
  la hauteur du container en function

  trouve un moyen de detecter le header en js sinon utilise $_server pour trouver le header et ensuite tu le passe par les attribut
*/


/* htmx.on('htmx:afterProcessNode',(e)=> {


console.log(e)

}) */

/* htmx.on('htmx:xhr:loadstart',(e)=> {
  console.log(e)
})

htmx.on('htmx:xhr:progress',(e)=> {
  console.log(e)
})
 */

/* const container:HTMLDivElement|null=document?.querySelector('#container')

const basicContainerHeight=container?.getBoundingClientRect().height;


const beforSwap=()=> {
  const container:HTMLDivElement|null=document?.querySelector('#container');

  if(container) {
   
  }
}

htmx.on('htmx:beforeSwap',beforSwap)

const func=(e:Event)=> {

  if(container) {


  }
  
}

htmx.on('htmx:afterSwap',func) */
