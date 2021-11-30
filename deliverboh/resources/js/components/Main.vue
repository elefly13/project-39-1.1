<template>
    <main>
        <div class="wrapper">
            <div class="check-box"></div>

            <div class="slogan">
                <div class="box-80">
                    <h1>I piatti che ami, a domicilio</h1>
                </div>
                <form class="box-search">
                    <input
                        class="ricerca"
                        v-model="ricercaPiatto"
                        type="text"
                        placeholder="Inserisci il tuo piatto preferito"
                        @keyup="$emit('search', ricercaPiatto)"
                    />
                    <button
                        class="cerca"
                        @click.prevent="$emit('search', ricercaPiatto)"
                    >
                        Cerca
                    </button>
                </form>
            </div>

            <div class="sfondo">
                <img src="/images/unarota.svg" />
            </div>
            <div class="sponsor">
                <div class="box-80">
                    <h3>I più popolari</h3>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: "Main",
    data() {
        return {
            ricercaPiatto: "",
        };
    },
    created() {},
    methods: {},
};
</script>
