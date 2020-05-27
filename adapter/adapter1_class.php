<?php
/**
 * ��������
 * Ӧ��ʵ��˵��
 * �������г�������������������������ֻ��ĳ����������൱����������
 * ��ڵ�ѹԭ����220V������ͨ������������������ѵ�ѹת��Ϊ5V,Ȼ����ֻ����
 */

/**
 * �������ࣨ��ڣ�
 * Class Voltage220V
 */
class Voltage220V{

    //���220V��ѹ
    public function output220V(){
        $srcV = 220;
        echo "ԭ��ѹ = ".$srcV."��".PHP_EOL;;
        return $srcV;
    }
}

/**
 * �������ӿ�
 * Interface Voltage5V
 */
interface Voltage5V{
    public function output5V();
}

/**
 * ������
 * Class VoltageAdapter
 */
class VoltageAdapter extends Voltage220V implements Voltage5V {
    public function output5V()
    {
        $srcV = $this->output220V();
        $dstV = $srcV/44;
        return $dstV;   //���5V��ѹ
    }
}

/**
 * �ֻ���
 * Class Phone
 */
class Phone{
    //���
    public function charging(Voltage5V $voltage5V){
        if($voltage5V->output5V() == 5){
            echo '��ѹΪ5V,���Գ��~ '.PHP_EOL;
        } else if($voltage5V->output5V() > 5){
            echo '��ѹ����5V,�����Գ��~ '.PHP_EOL;
        }
    }
}

/**
 * �ͻ��˿�ʼʹ��
 */
echo "~~~~~~~~����������ģʽ~~~~~~~";
$phone = new Phone();
$phone->charging(new VoltageAdapter());





