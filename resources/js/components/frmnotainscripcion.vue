<template>
    <div class="container">
        <h3>Nota Inscripcion</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Fecha</td>
                    <td><input type="date" v-model="fecha" placeholder="Fecha"></td>
                </tr>
                <tr>
                    <td>Cliente</td>
                    <td>
                        <select v-model="id_cliente">
                            <option value="0" disabled>Seleccione</option>
                            <option v-for="cliente in arrayCliente" :key="cliente.id" :value="cliente.id" 
                            v-text="cliente.nombre"></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="button" @click="nuevo()">Nuevo</button>
                        <button type="button" @click="guardar()">Guardar</button>
                        <button type="button" @click="modificar()">Modificar</button>
                        <button type="button" @click="eliminar()">Eliminar</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Tipo Inscripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="notainscripcion in arrayNotainscripcion" :key="notainscripcion.id">
                    <td v-text="notainscripcion.fecha"></td>
                    <td v-text="notainscripcion.nom_cliente"></td>
                    <td ></td>
                    <td><a href="#" @click="llenar(notainscripcion)">Seleccionar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                fecha :'',
                //id_tipoinscripcion : 0,
                id_cliente : 0,
                nomb_cliente: '',
                buscar : '',
                arrayNotainscripcion:[],
                arrayCliente : []
            }
        },
        methods:{
            listar(buscar){
                let me = this;
                var url='/notainscripcion?buscar=' + buscar;
                axios.get(url).then(function(response){
                    me.arrayNotainscripcion= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            selectCliente(){
                let me = this;
                axios.get('/cliente/selectCliente').then(function(response){
                    me.arrayCliente= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            guardar(){
                let me = this;
                axios.post('notainscripcion/registrar',{
                    'fecha': this.fecha,
                    'id_cliente' : this.id_cliente
                    //'id_notainscripcion' : this.id_notainscripcion
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });               
            },
            modificar(){
                let me = this;
                axios.put('notainscripcion/modificar',{
                   'fecha': this.descripcion,
                    'id_cliente' : this.id_cliente,
                    'id_notainscripcion' : this.id_notainscripcion,
                    'id': this.id_notainscripcion
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            eliminar(){
                let me = this;
                axios.put('notainscripcion/eliminar',{
                    'id': this.id_notainscripcion
                }).then(function(error){
                    me.listar('');
                }).catch(function(error){
                    console.log(error);
                });  
            },
            llenar(data=[]){
                this.id_notainscripcion=data['id'];
                this.fecha=data['fecha'];
                this.id_cliente=data['id_cliente'];
            },
            nuevo(){
                this.fecha = '';
                this.id_cliente=0;
            },
        },
        mounted() {
            this.listar(this.buscar);
            this.selectCliente();
        }
    }
</script>