for (let i = 0; i <= 30; i++) {
  const message = i % 2 === 0 ? `${i} is even` : `${i} is odd`;
  const outputDiv = document.getElementById('output');
  outputDiv.innerHTML += message + "<br>";
}
