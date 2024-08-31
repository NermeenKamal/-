function selectOnlyThis(checkbox) {
    var checkboxes = document.getElementsByName('vv');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}

function selectOnlyyThis(checkbox) {
    var checkboxes = document.getElementsByName('v');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}

function choose() {
    // الحصول على العناصر المختارة في كل مرة يتم استدعاء الدالة
    let eraChecked = document.querySelector('input[name="vv"]:checked');
    let typeChecked = document.querySelector('input[name="v"]:checked');

    if (eraChecked && typeChecked) {
        let eraId = eraChecked.value;
        let typeId = typeChecked.value;

        let sectionId = `${eraId}-${typeId}`;
        console.log('Section ID:', sectionId);  // تحقق من القسم المختار

        let url = `poetry-categories.html#${encodeURIComponent(sectionId)}`;
        window.location.href = url;
    } else {
        alert('يرجى اختيار كل من نوع الشعر والتصنيف.');
    }
}
