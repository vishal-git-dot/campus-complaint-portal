(() => {
  const root=document.documentElement, toggle=document.getElementById('themeToggle'), icon=document.getElementById('themeIcon'), text=document.getElementById('themeText');
  const applyTheme=theme=>{root.dataset.theme=theme;localStorage.setItem('campus-theme',theme);if(icon)icon.textContent=theme==='dark'?'☾':'☀';if(text)text.textContent=theme==='dark'?'Dark Mode':'Light Mode';};
  applyTheme(localStorage.getItem('campus-theme')||'light');
  toggle?.addEventListener('click',()=>applyTheme(root.dataset.theme==='dark'?'light':'dark'));
  window.showToast=(message,type='success')=>{const t=document.getElementById('toast');if(!t)return;t.textContent=message;t.className='toast show '+type;setTimeout(()=>t.className='toast',3200)};
  document.querySelectorAll('textarea[maxlength],textarea[name="description"]').forEach(el=>{const counter=document.querySelector(`.char-count[data-for="${el.name}"]`);const update=()=>{if(counter)counter.textContent=`${el.value.length} / 1000`;};el.maxLength=1000;el.addEventListener('input',update);update();});
  const file=document.getElementById('image'), fileName=document.getElementById('fileName'); file?.addEventListener('change',()=>{if(fileName)fileName.textContent=file.files[0]?.name||'No file selected';});
  if(new URLSearchParams(location.search).get('updated')){showToast('Complaint updated successfully.','success');history.replaceState({},'',location.pathname+'?id='+new URLSearchParams(location.search).get('id'));}
})();
