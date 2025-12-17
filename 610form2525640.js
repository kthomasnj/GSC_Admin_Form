document.addEventListener("DOMContentLoaded", () => {
  // Workflow stage click handler
  const stages = document.querySelectorAll('#workflow li');
  stages.forEach(stage => {
    stage.addEventListener('click', () => {
      stage.classList.add('completed');
      stage.classList.remove('active');
    });
  });

  // Word count limiter
  const textarea = document.getElementById('announcement');
  const wordCount = document.getElementById('wordCount');
  const maxWords = 40;

  textarea.addEventListener('input', () => {
    let words = textarea.value.trim().split(/\s+/).filter(w => w.length > 0);
    let count = words.length;

    if (count > maxWords) {
      textarea.value = words.slice(0, maxWords).join(" ");
      count = maxWords;
    }

    wordCount.textContent = `${count} / ${maxWords} words`;
  });
});
