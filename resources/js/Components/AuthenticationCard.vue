<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-center bg-gradient-to-r from-sky-200 to-blue-200">
        <div>
            <slot name="logo" />
        </div>

        <div class="md:w-full w-5/6 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-8">
            <slot />
        </div>
    </div>
</template>
