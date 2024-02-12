<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Interface;

interface SqlCommand
{
    // DDL (Data Definition Language)
    public function ddlCreate();
    public function ddlDrop();
    public function ddlAlter();
    public function ddlTruncate();

    // DML(Data Manipulation Language)
    public function dmlInsert();
    public function dmlUpdate();
    public function dmlDelete();
    public function dmlCall();
    public function dmlExplainCall();
    public function dmlLock();

    // TCL (Transaction Control Language)
    public function tclCommit();
    public function tclSavePoint();
    public function tclRollback();
    public function tclSetTransaction();
    public function tclSetConstrain();

    // DQL (Data Query Language)
    public function dqlSelect();

    // DCL (Data Control Language)
    public function dclGrant();
    public function dclRevoke();
}
