<template>
    <div class="search-result">
        <h2>{{ title }}</h2>
        <img :src="image">
        <span>{{ size }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                required: true
            },
            image: {
                type: String,
                required: true
            },
            height: {
                type: [String, Number],
                required: true
            },
            width: {
                type: [String, Number],
                required: true
            }
        },
        computed: {
            size () {
                return this.height + 'x' + this.width
            }
        }
    }
</script>
