<template>
    <div class="search-result">
        <div class="card">
            <img class="card-img-top" :alt="title"
                 :src="image"/>
            <div class="card-block">
                <h5 class="card-title">
                    {{ title }}
                </h5>
                <i>{{ size }}</i>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            title: {
                type: String
            },
            image: {
                type: String
            },
            height: {
                type: [String, Number]
            },
            width: {
                type: [String, Number]
            }
        },
        computed: {
            size () {
                return this.height + 'x' + this.width
            }
        }
    }
</script>
