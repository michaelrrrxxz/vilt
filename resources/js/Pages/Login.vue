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
    <div>
        <Head title="Login Page" />
        <h1>Login Page</h1>
        <Link href="/users">Go to Home</Link>
    </div>
</template>
