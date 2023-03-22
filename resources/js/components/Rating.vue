<style >
#form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
  }
#form p {
    text-align: center;
  }
  
  #form label {
    font-size: 20px;
  }
  
  input[type="radio"] {
    display: none;
   
  }
  
  label {
    color: grey;
    font-size: 20px;
  }
  
  .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
  }
  
  label:hover,
  label:hover ~ label {
    color: orange;
  }
  
  input[type="radio"]:checked ~ label {
    color: orange;
  }
</style>


<template>
  
    <p class="clasificacion">
        <input @click="setRate(5)" id="radio1" type="radio" name="estrellas" value="5"><!--
        --><label for="radio1">★</label><!--
        --><input @click="setRate(4)" id="radio2" type="radio" name="estrellas" value="4"><!--
        --><label for="radio2">★</label><!--
        --><input @click="setRate(3)" id="radio3" type="radio" name="estrellas" value="3"><!--
        --><label for="radio3">★</label><!--
        --><input @click="setRate(2)" id="radio4" type="radio" name="estrellas" value="2"><!--
        --><label for="radio4">★</label><!--
        --><input @click="setRate(1)" id="radio5" type="radio" name="estrellas" value="1"><!--
        --><label for="radio5">★</label>
      </p>
  
  </template>
  
  <script >
 
export default{
    mounted(){
      
    },
    data(){
        return{
            rate :"",
        }
    },
    methods:{
    setRate(stars) {
       
        this.rate =stars
}
    }
}




  </script>
  
 