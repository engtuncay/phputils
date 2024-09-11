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
    public string $ofcTxFieldName;

    /**
     * Alanın başlık açıklaması ( tablo için sütün başlığı , form için label alanı değeri / excelde başlık )
     */
    public string $ofcTxHeader;

    public string $txLabel;

    /**
     * Objedeki alan adı (fieldName) ile db deki alan adı aynı degilse kullanılır.
     */
    public string $ofcTxDbFieldName;

    /**
     * Col Id olması için konuldu - tekil kodu
     */
    public string $txGuid;

    //public ObjectProperty<Double> prefSize;

    //public Integer printSize;

    // Alanın türünü belirtir (double,string,date vs )
    public string $colType; //OzColType

    /**
     * Column Generic Type. Sütun nasıl bir tipte olduğunu gösterir. (Data Tipi degil)
     * <p>
     * Örneğin , Xml parse edilirken, alanın xmlAttribute türünde olduğunu gösterir.
     */
    //public OzColType colGenType;

    // Formlarda default true olarak çalışır, false olursa düzenleme izni vermez
    public bool $boEditable;


    /**
     * Formlarda gösterilmeyeceğini belirtir
     */
    public bool $boHidden;

    // excelden sütunları ayarlarken opsiyonel sütunların belinmesi için (zorunlu degil) , vs.. (boRequired:false da kullanılabilirdi.)
    public bool $boOptional;

    // excelde sütunun bulunduğunu gösterir
    public bool $boExist;

    // Excel için true olursa sütunun olması gerektiğini gösterir
    public bool $boRequired;

    // For Excel Reading, the field shows whether or not column exists in the excel
    public bool $boEnabled;

    // Reflection Field Alanlar

    // FiId
    public string $ofiTxIdType;
    // FiColumn
    public bool $ofcBoUniqGro1;
    public bool $ofcBoNullable;
    public bool $ofcBoUnique;
    public bool $ofcBoUtfSupport;
    public string $ofcTxDefValue;
    public string $ofcTxCollation;
    public string $ofcTxTypeName;
    public int $ofcLnLength;
    public int $ofcLnPrecision;
    public int $ofcLnScale;
    public bool $ofcBoFilterLike;

    public string $ofcTxFieldType;

    //FiTransient

    //public string $ofcTxEntityName;


    /**
     * alanın veritabanında olmadığını belirtir
     */
    public bool $oftBoTransient;

    //public string $ficTxSqlFieldDefinition;

    // Getters and Setters




}