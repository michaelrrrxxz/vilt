<script>

import { Link, Head } from '@inertiajs/vue3'
export default {
    components: {
        Link,
        Head
    }
}
</script>

<template>

    <Head title="Home Page" />
    <div>
        <h1>Home vue</h1>
        <Link href="/login">Click</Link>
    </div>
</template>
