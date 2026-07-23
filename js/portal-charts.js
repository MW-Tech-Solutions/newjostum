(function () {
  const colors = ["#0f6b42", "#c99b2e", "#8d1f2d", "#2b6cb0", "#6b7280", "#5b8c3a", "#7c3aed", "#0f766e", "#b45309", "#be123c", "#334155", "#15803d"];

  function drawBar(ctx, chart, w, h) {
    const labels = chart.labels || [];
    const datasets = chart.datasets || [{ label: chart.title || "", values: chart.values || [] }];
    const padding = { top: 24, right: 18, bottom: 74, left: 52 };
    const innerW = w - padding.left - padding.right;
    const innerH = h - padding.top - padding.bottom;
    const max = Math.max(1, ...datasets.flatMap(ds => ds.values || []));
    ctx.strokeStyle = "#dbe3eb";
    ctx.fillStyle = "#5d6b7c";
    ctx.font = "12px Poppins, Arial";
    for (let i = 0; i <= 4; i++) {
      const y = padding.top + innerH - (innerH * i / 4);
      ctx.beginPath();
      ctx.moveTo(padding.left, y);
      ctx.lineTo(w - padding.right, y);
      ctx.stroke();
      ctx.fillText(Math.round(max * i / 4).toLocaleString(), 8, y + 4);
    }
    const groupW = innerW / Math.max(1, labels.length);
    const barW = Math.max(5, (groupW - 10) / datasets.length);
    labels.forEach((label, i) => {
      datasets.forEach((ds, d) => {
        const value = Number((ds.values || [])[i] || 0);
        const bh = innerH * value / max;
        const x = padding.left + i * groupW + 5 + d * barW;
        const y = padding.top + innerH - bh;
        ctx.fillStyle = colors[d % colors.length];
        ctx.fillRect(x, y, barW - 2, bh);
      });
      ctx.save();
      ctx.translate(padding.left + i * groupW + groupW / 2, h - 58);
      ctx.rotate(-Math.PI / 5);
      ctx.fillStyle = "#102033";
      ctx.textAlign = "right";
      ctx.fillText(String(label).slice(0, 22), 0, 0);
      ctx.restore();
    });
  }

  function drawDoughnut(ctx, chart, w, h) {
    const labels = chart.labels || [];
    const values = chart.values || [];
    const total = values.reduce((a, b) => a + Number(b || 0), 0) || 1;
    const cx = w / 2;
    const cy = Math.min(h / 2, 145);
    const radius = Math.min(w, h) * 0.25;
    let start = -Math.PI / 2;
    values.forEach((value, i) => {
      const angle = Math.PI * 2 * Number(value || 0) / total;
      ctx.beginPath();
      ctx.moveTo(cx, cy);
      ctx.arc(cx, cy, radius, start, start + angle);
      ctx.closePath();
      ctx.fillStyle = colors[i % colors.length];
      ctx.fill();
      start += angle;
    });
    ctx.fillStyle = "#fff";
    ctx.beginPath();
    ctx.arc(cx, cy, radius * 0.55, 0, Math.PI * 2);
    ctx.fill();
    ctx.fillStyle = "#102033";
      ctx.font = "700 16px Poppins, Arial";
    ctx.textAlign = "center";
    ctx.fillText(total.toLocaleString(), cx, cy + 5);
    ctx.textAlign = "left";
    ctx.font = "12px Poppins, Arial";
    labels.forEach((label, i) => {
      const x = 20 + (i % 2) * (w / 2);
      const y = h - 70 + Math.floor(i / 2) * 22;
      ctx.fillStyle = colors[i % colors.length];
      ctx.fillRect(x, y - 10, 12, 12);
      ctx.fillStyle = "#102033";
      ctx.fillText(`${label}: ${Number(values[i] || 0).toLocaleString()}`, x + 18, y);
    });
  }

  function render(canvas) {
    const chart = JSON.parse(canvas.dataset.chart || "{}");
    const scale = window.devicePixelRatio || 1;
    const rect = canvas.getBoundingClientRect();
    const w = Math.max(320, rect.width);
    const h = Number(canvas.getAttribute("height") || 300);
    canvas.width = w * scale;
    canvas.height = h * scale;
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    const ctx = canvas.getContext("2d");
    ctx.scale(scale, scale);
    ctx.clearRect(0, 0, w, h);
    ctx.fillStyle = "#fff";
    ctx.fillRect(0, 0, w, h);
    if (chart.type === "doughnut") {
      drawDoughnut(ctx, chart, w, h);
    } else {
      drawBar(ctx, chart, w, h);
    }
  }

  function renderAll() {
    document.querySelectorAll(".portal-chart").forEach(render);
  }

  window.addEventListener("load", renderAll);
  window.addEventListener("resize", renderAll);
})();
