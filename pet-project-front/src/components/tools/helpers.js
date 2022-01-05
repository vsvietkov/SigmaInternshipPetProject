export function clearErrorSpans() {
  document.querySelectorAll('.input-error').forEach(element => {
    element.innerHTML = ''
  })
}
