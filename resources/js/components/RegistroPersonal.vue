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
        async save(){
          
            const payload = JSON.stringify(this.producto);
            const url = this.$SERVER_URL + "/productos";
            const r = await fetch(url, {
                method: "POST",
                body: payload,
                headers: {
                    "Content-type": "application/json",
                }
            });
            const response = await r.json();

            if(response['code'] ==200){
                alert("Registrado con éxito")
                
                this.producto = null
            }else{

                alert(JSON.stringify(response['response']))
            }

            console.log(response)
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
            console.log(response['response'])
            this.categorias= response['response']

    }
   
}

</script>

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


<button @click.prevent="save(event)" class="btn btn-primary mt-4">Registrar</button>




</form>
</div>

</template>

