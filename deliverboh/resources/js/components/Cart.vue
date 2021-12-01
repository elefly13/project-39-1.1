<template>
    <section>
        <div class="area-carrello">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">carrello</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body" v-for="(dish, index) in cartContent" :key="index">
                            <ul>
                                <li>{{ dish[index].name }}</li>
                                <li>{{ dish[index].description}}</li>
                                <li>{{ dish[index].ingredients }}</li>
                                <li>{{ dish[index].price }}</li>
                                <li><button>+</button><button>-</button></li>
                            </ul>
                        </div>
                        <div class="panel-footer"><button>procedi al pagamento</button></div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
</template>

<script>
export default {
    
    name: "Cart",
    props: ['cartContent'],
    data() {
        return {
            
        };
    },
    created() {
        
    },
    methods: {
        
    }
};
</script>