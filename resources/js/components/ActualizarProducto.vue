
<template>

<div class="container-fluid">
<form class="col-md-6">

<label>SKU:</label>
<input v-model="producto.sku" type="text" class="form-control" />




<label>Nombre:</label>

<input v-model="producto.nombre" type="text" class="form-control" />


<label>Categoría:</label>
 <select  v-if="categorias.length > 0" class="form-select" id="categoria" v-model="producto.id_categoria">
 <option value="" >Seleccione una opción</option>
      <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.nombre }}</option>
</select>



<label>Descripción:</label>

<textarea v-model="producto.descripcion" class="form-control"></textarea>


<label>Precio:</label>

<input v-model="producto.precio" type="number" class="form-control" />

<label>Cantidad:</label>

<input v-model="producto.cantidad" type="number" class="form-control" />

<label>Estado:</label>

 <select class="form-select" id="estado" v-model="producto.estado">
 <option value="" >Seleccione una opción</option>
      <option v-for="estado in estados" :key="estado" :value="estado">{{ estado }}</option>
    </select>


<button @click.prevent="update(event)" class="btn btn-primary mt-4">Actualizar</button>




</form>
</div>

</template>

<script>

export default{
    data(){
        return {
            producto:{
            sku:"",
            nombre:"",
            id_categoria:"",
            descripcion:"",
            precio:"",
            cantidad:"",
            estado:"",
            },
            categorias:[],
           estados: ['con inventario', 'sin inventario']  
        }
    },
    methods:{
        async update(){
          
            const payload = JSON.stringify(this.producto);
            const url = this.$SERVER_URL + "/productos/"+this.$route.params.id;
            const r = await fetch(url, {
                method: "PUT",
                body: payload,
                headers: {
                    "Content-type": "application/json",
                }
            });
            const response = await r.json();

            if(response['code'] ==200){
                alert("Actualizado con éxito")
                
            }else{
                alert(JSON.stringify(response['response']))
            }

        },
       
    },
    async mounted(){
           
            const url = this.$SERVER_URL + "/categorias";
            const r = await fetch(url, {
                method: "GET",
                headers: {
                    "Content-type": "application/json",
                }
            });
            const response = await r.json();
           
            this.categorias= response['response']


            const url_productos = this.$SERVER_URL + "/productos/"+this.$route.params.id;
           const res = await fetch(url_productos, {
               method: "GET",
               headers: {
                   "Content-type": "application/json",
               }
           });
           const respuesta = await res.json();
           if(respuesta['code']==200){
                this.producto = respuesta['response']
                console.log(respuesta['response'])
           }

    }
   
}

</script>
