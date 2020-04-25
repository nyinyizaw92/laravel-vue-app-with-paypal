<template>
    <div>
        <div v-for="category in this.categories">
        <h4>{{category.name}}</h4>
        
            <ul>
                <li v-for="subcat in category.subcategories">
                    {{subcat.subcategoryname}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props:['categories'],
        data(){
            return{

            }
        }
    }
</script>
