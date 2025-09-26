<template>
    <div>
        <div ref="editor"></div>
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import $ from "jquery";
import "summernote/dist/summernote-lite.js";

const props = defineProps({
    modelValue: String,
    toolbar: {
        type: Array,
        default: () => [
            ["style", ["bold", "italic", "underline", "clear"]],
            // ['para', ['ul', 'ol', 'paragraph']], // ['insert', ['link', 'picture']], // ['view', ['codeview']],
        ],
        // You can pass a different toolbar array from parent
    },
});

const emit = defineEmits(["update:modelValue"]);
const editor = ref(null);

onMounted(() => {
    $(editor.value).summernote({
        placeholder: props.placeholder,
        tabsize: 2,
        height: props.height ?? 200,
        toolbar: props.toolbar,
        callbacks: {
            onChange: function (contents) {
                emit("update:modelValue", contents);
            },
        },
    });

    // Set initial content
    $(editor.value).summernote("code", props.modelValue || "");
});

// Keep content in sync when v-model changes externally
watch(
    () => props.modelValue,
    (newVal) => {
        const currentVal = $(editor.value).summernote("code");
        if (newVal !== currentVal) {
            $(editor.value).summernote("code", newVal);
        }
    },
);
</script>
