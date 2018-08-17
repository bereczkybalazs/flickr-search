<template>
    <div>
        <div class="search-result">
            <img :alt="title" :src="image"/>
            <div class="content">
                <h5>
                    {{ title }}
                </h5>
                <i>({{ size }})</i>
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
