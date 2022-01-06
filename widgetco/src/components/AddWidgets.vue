<template>
  <div></div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'AddWidgets',
  created () {
    axios.get('http://localhost/kaweb/test/widgetapi/public/api/testC')
      .then((res) => {
        console.log(res);
      })
      .catch((err) => {
        console.log(err)
      })
  }
}
</script>