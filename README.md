# 🚀 Employee Management System (Core PHP)

Bu proyekt, işçilərin idarə edilməsi üçün hazırlanmış, təmiz kod strukturuna və yüksək təhlükəsizlik standartlarına malik mini bir CRUD sistemidir. Layihə heç bir framework istifadə edilmədən, **Core PHP** mühitində modulyar arxitektura (MVC-like) ilə inşa olunub.

---

## 💎 Əsas Özəlliklər

### 🏗️ Memarlıq və Struktur
- **Pattern:** Kod bazası Models, Controllers və Views qovluqlarına bölünərək modulyar hala gətirilib.
- **Data Access:** Verilənlər bazası ilə əlaqə üçün **PDO** driverindən istifadə olunub.
- **Routing:** Bütün sorğular mərkəzi `index.php` (Entry Point) üzərindən idarə edilir.

### 🛡️ Təhlükəsizlik
- **SQL Injection:** Bütün sorğular **Prepared Statements** vasitəsilə icra edilir.
- **XSS Qoruması:** İstifadəçidən gələn və ekrana yazdırılan bütün datalar `htmlspecialchars()` süzgəcindən keçirilir.
- **Validation:** Email formatı, unikal email yoxlanışı və sahələrin doluluğu həm backend, həm də frontend səviyyəsində yoxlanılır.

### 🌟 Funksionallıq (Bonuslar daxil)
- **Full CRUD:** İşçilərin əlavə edilməsi, siyahılanması, redaktə (Modal ilə) və silinməsi.
- **Live Search (Bonus):** Axtarış düyməsinə ehtiyac olmadan, inputa yazıldığı an avtomatik axtarış (Debounce məntiqi ilə).
- **Pagination (Bonus):** Hər səhifədə 10 qeyd (record) olmaqla sistemli səhifələmə.
- **Actions:** Hər bir işçi üçün sürətli Redaktə və Silmə (Confirm dialoqu ilə) düymələri.

---

## 📁 Qovluq Strukturu

```text
├── app/
│   ├── Controllers/  # Biznes məntiqi (EmployeeController.php)
│   └── Models/       # Verilənlər bazası əməliyyatları (Employee.php)
├── config/           # Database bağlantısı (database.php)
├── views/            # UI interfeysi və Modallar
├── index.php         # Giriş nöqtəsi və Router
├── employees.sql     # Database skripti
└── README.md         # Layihə sənədləşməsi