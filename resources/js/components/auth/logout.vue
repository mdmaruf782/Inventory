<template>
    
</template>
<script>
export default {
    created() {
       localStorage.removeItem('token')
       localStorage.removeItem('user')
       this.$router.push('/')
       Toast.fire({
          type: 'success',
          title: 'Logout in successfully'
         })

    },
    data() {
        return {
            
        }
    },
}
</script>
