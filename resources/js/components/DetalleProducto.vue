<style>

.nombre{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px;
}
.color-v{
    color: blueviolet;
}
.txt-price{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    color: blueviolet;
}
.btn-cali{
    border: 1px solid #C2C2C2;
    width: 22%;
    padding: 8px;
    border-radius: 5px;
}


</style>

<template>

<div class="container-fluid">

<div class="row">



<div class="col-md-5">
<img>

</div>

<div class="col-md-7">
    <span class="nombre mt-4">
       {{ producto.nombre }}

    </span>

    <p class="categoria">
        By
        <span class="color-v" v-for="cat in producto.categorias" :key="cat.id" >{{cat.nombre}}</span>
  
      </p>

      <div class="col-md-12 d-flex" >
        <span class="txt-price">
            ${{ producto.precio }}
        </span>
        
        <Rating  ref="nameOfRef" style="margin-left:10px"></Rating>
   

    </div>

    <div>
        <span v-if="producto.cantidad > 0 " 
            class="">Disponible-
        </span>
        <span v-else
            class="">No disponible-
        </span>
        <span  v-if="producto.cantidad > 0 " class="stock-b mb-4">In Stock</span>

        <span  v-else class="stock-w mb-4">No stock</span>
    

    </div>

    <div>
        <p>

            {{ producto.descripcion }}
        </p>
    </div>
    <hr>

    <div class="col-md-12 d-flex">
        <button @click="calificarProducto(producto.id)" class="btn-cali">
            <i class="far fa-heart"></i>
            Calificar
        </button>
    </div>
</div>

</div>
</div>



</template>



<script>
import Rating from './Rating.vue'

export default{
    components: { Rating },
    data(){
        return{
            producto:{
            sku:"",
            nombre:"",
            id_categoria:"",
            descripcion:"",
            precio:"",
            cantidad:"",
            estado:"",
            categorias:[],
            calificacion:"",
            },
           
        }

    },
    methods:{
        async calificarProducto(producto){
          
            let rate = this.$refs.nameOfRef.rate;
        
            const url = this.$SERVER_URL + "/rateProduct/"+this.$route.params.id+"/"+rate;
           const r = await fetch(url, {
               method: "GET",
               headers: {
                   "Content-type": "application/json",
               }
           });
           const response = await r.json();
           if(response['code']==200){
                alert(response['response'])
           }

            
    },
    },
    async mounted(){
        
        const url = this.$SERVER_URL + "/productos/"+this.$route.params.id;
           const r = await fetch(url, {
               method: "GET",
               headers: {
                   "Content-type": "application/json",
               }
           });
           const response = await r.json();
           if(response['code']==200){
                this.producto = response['response']
           }
          
    }
}

</script>