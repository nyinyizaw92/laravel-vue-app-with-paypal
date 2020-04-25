<template>
    <div class="w-100">
        <div class="row">
            <div class="col-12">
                <div class="categorybox">
                    <h5>show all links</h5>
                </div>
            </div>

            <div class="p-2 col-4" v-for="category in this.categories"> 
                <div class="categorybox w-100 align-center" @click="selectedCat(category.id)">
                    <h5 class="text-center">
                        {{category.name}}
                    </h5>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="p-2" v-for="subcategory in filteredsubcategories">
                <div class="categorybox w-100 align-center"  @click="selectedsubCat(subcategory.id)">
                    <h6 class="text-center">{{subcategory.subcategoryname}}</h6>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-4 p-2" v-for="domain in filtereddomains">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Website Name:</strong>{{domain.title}}</p>
                        <p><strong>Website Url:</strong><a :href="domain.url">{{domain.url}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['domains','categories','subcategories'],
    data(){
        return{
            selectedcategory:'',
            selectedsubcategory:''
        }
    },

    methods:{
        selectedCat:function(id){
            this.selectedcategory = id;
            this.selectedsubcategory = '';
        },
        selectedsubCat:function(id){
            this.selectedsubcategory = id;
        }
    },

    computed:{
          filteredsubcategories:function(){
            return this.subcategories.filter((item) => item.category_id == this.selectedcategory);
        },

        filtereddomains:function(){
            if(this.selectedcategory === '' && this.selectedsubcategory === ''){
                return this.domains;
            }else if(this.selectedcategory === '' && this.selectedsubcategory !== ''){
                return this.domains.filter((item) => item.subcategory_id == this.selectedsubcategory);
            }else if(this.selectedcategory !== '' && this.selectedsubcategory === ''){
                return this.domains.filter((item) => item.category_id == this.selectedcategory);
            }else if(this.selectedcategory !== '' && this.selectedsubcategory != ''){
                return this.domains.filter((item) => item.subcategory_id == this.selectedsubcategory);
            }
        }
    }
}
</script>