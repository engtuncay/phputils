<?php

namespace Engtuncay\Phputils\meta;
/**
 *
 */
class FiCol
{
    /**
     * Alanın ismini (veritabanındaki veya objedeki refere ettiği alan ismi )
     */
    public ?string $ofcTxFieldName = null;

    /**
     * Alanın başlık açıklaması ( tablo için sütün başlığı , form için label alanı değeri / excelde başlık )
     */
    public ?string $ofcTxHeader =  null;

    public ?string $txLabel = null;

    /**
     * Objedeki alan adı (fieldName) ile db deki alan adı aynı degilse kullanılır.
     */
    public ?string $ofcTxDbFieldName  = null;

    /**
     * Col Id olması için konuldu - tekil kodu
     */
    public ?string $txGuid = null;

    //public ObjectProperty<Double> prefSize;

    //public ?integer printSize;

    // Alanın türünü belirtir (double,?string,date vs )
    public ?string $colType  = null; //OzColType

    /**
     * Column Generic Type. Sütun nasıl bir tipte olduğunu gösterir. (Data Tipi degil)
     * <p>
     * Örneğin , Xml parse edilirken, alanın xmlAttribute türünde olduğunu gösterir.
     */
    //public OzColType colGenType;

    // Formlarda default true olarak çalışır, false olursa düzenleme izni vermez
    public ?bool $boEditable =null;


    /**
     * Formlarda gösterilmeyeceğini belirtir
     */
    public ?bool $boHidden = null;

    // excelden sütunları ayarlarken opsiyonel sütunların belinmesi için (zorunlu degil) , vs.. (boRequired:false da kullanılabilirdi.)
    public ?bool $boOptional;

    // excelde sütunun bulunduğunu gösterir
    public ?bool $boExist = null;

    // Excel için true olursa sütunun olması gerektiğini gösterir
    public ?bool $boRequired = null;

    // For Excel Reading, the field shows whether or not column exists in the excel
    public ?bool $boEnabled = null;

    // Reflection Field Alanlar

    // FiId
    public ?string $ofiTxIdType = null;
    // FiColumn
    public ?bool $ofcBoUniqGro1 = null;
    public ?bool $ofcBoNullable = null;
    public ?bool $ofcBoUnique = null;
    public ?bool $ofcBoUtfSupport = null;
    public ?string $ofcTxDefValue = null;
    public ?string $ofcTxCollation = null;
    public ?string $ofcTxTypeName = null;
    public ?int $ofcLnLength = null;
    public ?int $ofcLnPrecision = null;
    public ?int $ofcLnScale = null;
    public ?bool $ofcBoFilterLike = null;

    public ?string $ofcTxFieldType = null;

    //FiTransient

    //public ?string $ofcTxEntityName;


    /**
     * alanın veritabanında olmadığını belirtir
     */
    public ?bool $oftBoTransient = null;

    //public ?string $ficTxSqlFieldDefinition;

    /**
     * @param string|null $ofcTxFieldName
     * @param string|null $ofcTxHeader
     */
    public function __construct(?string $ofcTxFieldName , ?string $ofcTxHeader = null)
    {
        $this->ofcTxFieldName = $ofcTxFieldName;
        $this->ofcTxHeader = $ofcTxHeader;
    }


}