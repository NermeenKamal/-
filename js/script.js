// تحديد التاريخ الحالي
const d = new Date();

// عرض الشهر واليوم باللغة العربية
document.querySelector("#demo").innerHTML = d.toLocaleDateString('ar-EG', { month: 'numeric', day: 'numeric' });

// عرض التاريخ الكامل باللغة العربية
document.querySelector("#year").innerHTML = d.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });



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

