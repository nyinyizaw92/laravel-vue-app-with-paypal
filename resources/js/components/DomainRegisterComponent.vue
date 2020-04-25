<template>
    <div>
        <form method="POST" enctype="multipart/form-data" @submit.prevent="submitDomain">
            <div class="form-group">
                <label for="category">Select categroy</label>
                <select id="category" class="form-control" v-model="form.category_id">
                    <option v-for="category in this.categories" :value="category.id">{{category.name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory">Select categroy</label>
                <select id="subcategory" class="form-control" v-model="form.subcategory_id">
                    <option v-for="subcategory in filteredsubcategories" :value="subcategory.id">{{subcategory.subcategoryname}}</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" v-model="form.email" id="email" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="url">Enter your domain url</label>
                    <input type="text" v-model="form.url" @keydown="form.errors.clear('url')" id="url" class="form-control"
                    :class="{'is-invalid':form.errors.has('url')}">
                    <div class="invalid-feedback" v-show="form.errors.has('url')" v-text="form.errors.get('url')"></div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="file" id="img" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Title of your domain</label>
                <input type="text" v-model="form.title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="shortdest">short description</label>
                <input type="text" class="form-control" v-model="form.shortdest" id="shortdest">
            </div>

            <div class="form-group">
                <vue-editor v-model="form.desc" />
            </div>
            <div ref="paypal"></div>
        </form>
       
    </div>
</template>
<script>
export default {
    props:['categories','subcategories'],
    data(){
        return{
            // product:{
            //     // description:"payment for backlink app",
            //     price:9.91
            // },
            form:new Form({
                email:'',
                title:'',
                url:'',
                shortdest:'',
                desc:'',
                paid:true,
                category_id:1,
                subcategory_id:''
            })
        }
    },

    mounted:function(){
        const script = document.createElement('script');

        script.src="https://www.paypal.com/sdk/js?client-id=AeuPLdOBVTqbdUkst3DY9x616ET1R3PQ8zsIzUUFJBVu-CNpsJo_WvPfHTfxASdzJdSG2Z7-7o79NYA7"; 
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.
        script.addEventListener("load",this.setLoaded);
        document.body.appendChild(script);
  
    },

    methods:{

        setLoaded:function(){
            window.paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                // description:this.product.description,
                amount: {
                    currency_code : 'USD',
                    value: "9.99"
                }
                }]
            });
            },

            onApprove:async(data,actions,resp)=>{
                const order = await actions.order.capture();
                this.data;
                this.submitDomain();
            },
            onError:err=>{
                console.log(err);
            }
        }).render(this.$refs.paypal);                                                    
            
        },

        submitDomain(){
            let data = new FormData();
            data.append('title',this.form.title);
            data.append('email',this.form.email);
            data.append('url',this.form.url);
            data.append('shortdest',this.form.shortdest);
            data.append('desc',this.form.desc);
            data.append('category_id',this.form.category_id);
            data.append('subcategory_id',this.form.subcategory_id);
            if(document.getElementById('img').files[0]){
                data.append('img',document.getElementById('img').files[0]);
            }

            axios.post('/domain',data)
            .then((response)=>{
                this.form.reset();
                window.location.href = '../';
            })
            .catch(error=>this.form.errors.record(error.response.data));
        }
    },

    computed:{
        filteredsubcategories:function(){
            return this.subcategories.filter((item) => item.category_id == this.form.category_id);
        }
    }
}
</script>