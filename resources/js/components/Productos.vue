<style>

.stock-b{
    color:#0FE713;
}

.stock-w{
    color:#D31414;
}


.nombre{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px;
}

.color-v{
    color: blueviolet;
}

.btn-calificar{
    font-family: Arial, Helvetica, sans-serif;
    color:white;
    padding:10px;
    border: 0px ;
    border-radius: 8px;
    background-color: blueviolet;
}


.btn-eliminar{
    padding:10px;
    border: 0px ;
    border-radius: 8px;
}

.txt-price{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    color: blueviolet;
}

.sep{
    padding-bottom: 20px;
}

.list-group-item{
    border-radius: inherit !important;
    border:0px !important;


    padding: 0 1rem 0 1rem !important;
}

</style>

<template>

<ul class="list-group">
  <li v-for="producto in productos" :key="producto.id" 
  class="list-group-item me-4 ms-4 mb-4">
  <div class="row container-fluid"> 

    <div class="col-md-3">

        <div class="col-md-12 p-4 d-flex justify-content-end">
            <img src="../assets/watch.png">
        </div>
       
        <div class="col-md-12 d-flex justify-content-center">
            <RouterLink class="nav-link" :to="{path: '/detalle-producto/' + producto.id}" >Detalle</RouterLink>
        </div>

       
    </div>

    <div class="col-md-6" style="padding-top:10px">
    <span class="nombre mt-4">
        {{ producto.nombre }}

    </span>

    <p class="categoria">
      By
      <span class="color-v" v-for="cat in producto.categorias" :key="cat.id" >{{cat.nombre}}</span>

    </p>
    <Rating :ref="'name' + producto.id" ></Rating>

    <p  v-if="producto.cantidad > 0 " class="stock-b mb-4">In Stock</p>

    <p  v-else class="stock-w mb-4">No stock</p>


    <div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
        <button @click="removeCantidad(producto.id)" type="button" class="btn btn-outline-primary">-</button>
        <button type="button" class="btn btn-outline-primary">{{producto.cantidad}}</button>
        <button @click="addCantidad(producto.id)" type="button" class="btn btn-outline-primary">+</button>
      </div>
       
    </div>

    <div class="col-md-3" style="border-left:1px solid gray;padding-top:10px ">
    <div class="row">

        <div class="col-md-12 d-flex justify-content-center sep" >
            <span class="txt-price">
                ${{ producto.precio }}
            </span>
        </div>
  
    <div class="col-md-12 d-flex justify-content-center sep">
    <span v-if="producto.estado == 'con inventario' " 
        class="badge rounded-pill bg-success">Disponible
    </span>
    <span v-else
        class="badge rounded-pill bg-danger">No disponible
    </span>
    </div>
    <div class="col-md-12 d-flex justify-content-center sep">
        <button @click="eliminarProducto(producto.id)" class="col-md-12 btn-eliminar">
            <i class="fa fa-times" aria-hidden="true"></i>    
            Eliminar
        </button>
    </div>
    <div class="col-md-12 d-flex justify-content-center sep">
    
        <RouterLink class="nav-link"  :to="{path: '/actualizar-producto/' + producto.id}" >
            <button class=" btn-eliminar">
                <i class="fa fa-edit" aria-hidden="true"></i>    
                Editar
            </button>
        </RouterLink>
    </div>
    <div class="col-md-12 d-flex justify-content-center sep">
        <button @click="calificarProducto(producto.id,'name' + producto.id)" class="col-md-12 btn-calificar">
            <i class="far fa-heart"></i>
            Calificar
        </button>
    </div>

   
    
</div>
    </div>
    
  </div>
  
  </li>
 
</ul>

</template>



<script>

import Rating from './Rating.vue';

export default{
    components: { Rating },
    data(){
        return {
            productos:{
            sku:"",
            nombre:"",
            id_categoria:"",
            descripcion:"",
            precio:"",
            cantidad:"",
            estado:"",
            calificaciones:[],
            categorias:[],
            },
            disponible:false,
          
        }
    },
    methods:{

        async calificarProducto(producto,ref){
          
        let rate = this.$refs[ref][0].rate

        if(rate === ""){
            rate = 0
        }
       

          const url = this.$SERVER_URL + "/rateProduct/"+producto+"/"+rate;
         const r = await fetch(url, {
             method: "GET",
             headers: {
                 "Content-type": "application/json",
             }
         });
         const response = await r.json();
         if(response['code']==200){
              alert(response['response'])
         }else{
            console.log(response['response'])
         }

          
  },
        async eliminarProducto(producto){           
           
            const url = this.$SERVER_URL + "/productos/"+producto;
           const r = await fetch(url, {
               method: "DELETE",
               headers: {
                   "Content-type": "application/json",
               }
           });
           const response = await r.json();

           if(response['code']==200){
            this.removeElement(this.productos,producto)
           }

        }
        ,
        async changeInv(producto,cantidad){

            const url = this.$SERVER_URL + "/changeInv/"+producto+"/"+cantidad;
           const r = await fetch(url, {
               method: "GET",
               headers: {
                   "Content-type": "application/json",
               }
           });
          

        },
        removeElement(array,id_search){

            return array.splice(array.findIndex(e => e.id === id_search),1);
        },
        findElement(array,id_search){
            return array.findIndex(element => element.id === id_search) ?? -1;
        },

        addCantidad(id){    
            let index= this.findElement(this.productos,id)
            let cantidad = this.productos[index].cantidad;
            cantidad = cantidad + 1
            this.productos[index].cantidad = cantidad
            this.changeInv(id,cantidad)

        },
        removeCantidad(id){

            let index= this.findElement(this.productos,id)
            let cantidad = this.productos[index].cantidad;
            if(cantidad>=0){
                cantidad = cantidad - 1
                this.productos[index].cantidad = cantidad
                this.changeInv(id,cantidad)

            }

            
        }
    },
    async mounted(){
           
           const url = this.$SERVER_URL + "/productos";
           const r = await fetch(url, {
               method: "GET",
               headers: {
                   "Content-type": "application/json",
               }
           });
           const response = await r.json();
          
           this.productos = response['response']


   }
}

</script>


