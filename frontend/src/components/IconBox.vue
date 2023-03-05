<script>

export default {
    name: 'IconBox'
}

</script>

<template>
    <div class="flex gap-1 align-middle">
        <slot name="icon"/>
        <span>
            <slot/>
        </span>
    </div>
</template>    