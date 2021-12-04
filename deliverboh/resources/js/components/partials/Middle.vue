<template>
    <!-- <section class="middle d-flex flex-column align-items-center justify-content-center"> -->
    <section class="middle">
        <div class="davide">
            <Search @performSearch="searchRest"/>
        </div>
        <div class="test">
            <i @click="left" class="fas fa-chevron-left"></i>
            <div v-for="(user, index) in filterUsers" :key="index" class="col-6 col-md-4 col-lg-3 fi">
                <User :info="user" />
            </div>
            <i @click="right" class="fas fa-chevron-right"></i>
            <!-- <ul class="d-flex flex-wrap px-5">
                <li v-for="(user, index) in filterUsers" :key="index" class="col-6 col-md-4 col-lg-3">
                    <User :info="user" />
                </li>
            </ul> -->
        </div>
        <div class="elena">
            <img src="/images/unarota.svg" alt="">
        </div>
       
    </section>
</template>

<script>
import User from "./User.vue"
import Search from "./Search.vue"
export default {
    name: "Middle",
    props: ['categoriesArray'],
    components: {
        User,
        Search,
    },
    data() {
        return {
            url: "http://127.0.0.1:8000/api/",
            searchrestaurant: "",
            users: [], 
            searchText: '',
            categoryUsers: [],
            pippo: {
                cusineCollection: []
            }
        };
    },
    created() {
        this.getUsers();
        this.getCategoryUsers();
    },
    computed: {
        filterUsers() {
            if (this.searchText === "") {
                var usersArray = [];
                for (const i in this.categoriesArray) {
                    for (const j in this.categoryUsers) {
                        if (this.categoryUsers[j].category_id == this.categoriesArray[i]){
                            if(!usersArray.includes(this.categoryUsers[j].user_id))
                                usersArray.push(this.categoryUsers[j].user_id)
                        }
                    }
                }
                console.log(usersArray)
                var ristoranti = [] 
                for (const i in this.users) {
                    for (const k in usersArray) {
                        if (this.users[i].id == usersArray[k]) {
                            if(!ristoranti.includes(this.users[i]))
                                ristoranti.push(this.users[i])
                        }
                    }
                }
                return ristoranti;
        
            } else {
                let filteredList = this.users.filter( item => {
                    return item.name
                        .toLowerCase()
                        .includes(this.searchText.toLowerCase());
                })
                return filteredList;
            } 
        }
    },
    methods: {
        getUsers(){
            // const bodyParameters = {
            //     key: "value",
            // };

            // const config = {
            //     headers: { Authorization: `Bearer ${this.api_token}` },
            // };
            axios
                .get(this.url + 'users')
                .then((resp)=>{
                    this.users = resp.data.results
                    // console.log(resp.data.results);
                })
                .catch();
        },
        searchRest(text) {
            this.searchText = text;
        },
         getCategoryUsers(){
            const bodyParameters = {
                key: "value",
            };

            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .get(this.url + 'categoryUsers', bodyParameters, config)
                .then((resp)=>{
                    this.categoryUsers = resp.data.results;
                    console.log(this.categoryUsers);
                })
                .catch();
        },
    },
};
</script>


<style lang="scss" scoped>
.middle {
    width: calc((100%/6) * 5);
    height:calc(100vh - 80px);
    position: relative;
}

.elena {
    width: 80%;
    height: 100%;
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
}

.elena > img {
    width: 100%;
    height: 85%;
    object-fit:contain;
    object-position: 120%;
}

.davide {
    width: 100%;
    height: 30%;
    // position: absolute;
}

.test {
    width: 100%;
    height: 45%;
    // background: rgba(191, 215, 188, 0.2);
    background: white;
    overflow: auto;
    margin-bottom: 150px;
    display: flex;
    align-items: center;
}

</style>
