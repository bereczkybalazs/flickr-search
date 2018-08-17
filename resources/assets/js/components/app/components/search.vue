<template>
    <div>
        <input type="text" v-model="keyword">
    </div>
</template>

<script>
    import bus from '../../../bus'

    export default {
        data () {
            return {
                keyword: ''
            }
        },
        watch: {
            keyword (keyword) {
                if (keyword.length > 2) {
                    bus.$emit('searchByKeyword', keyword)
                }
            }
        }
    }
</script>
