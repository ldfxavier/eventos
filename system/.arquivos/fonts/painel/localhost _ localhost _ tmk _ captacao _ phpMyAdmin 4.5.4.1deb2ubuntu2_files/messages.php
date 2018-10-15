var PMA_messages = new Array();
PMA_messages['strNoDropDatabases'] = "Os comandos \"DROP DATABASE\" estão desactivados.";
PMA_messages['strConfirm'] = "Confirmar";
PMA_messages['strDoYouReally'] = "Você realmente deseja executar \"%s\"?";
PMA_messages['strDropDatabaseStrongWarning'] = "Estará prestes a DESTRUIR uma base de dados completa!";
PMA_messages['strDropTableStrongWarning'] = "Está prestes a DESTRUIR uma base de dados completa!";
PMA_messages['strTruncateTableStrongWarning'] = "Está prestes a TRUNCAR uma base de dados completa!";
PMA_messages['strDeleteTrackingData'] = "Delete tracking data for this table?";
PMA_messages['strDeleteTrackingDataMultiple'] = "Delete tracking data for these tables?";
PMA_messages['strDeleteTrackingVersion'] = "Delete tracking data for this version?";
PMA_messages['strDeleteTrackingVersionMultiple'] = "Delete tracking data for these versions?";
PMA_messages['strDeletingTrackingEntry'] = "Delete entry from tracking report?";
PMA_messages['strDeletingTrackingData'] = "Apagando dados de tracking";
PMA_messages['strDroppingPrimaryKeyIndex'] = "Apagando Chave Primária/Indice";
PMA_messages['strDroppingForeignKey'] = "Eliminando Chave estrangeira.";
PMA_messages['strOperationTakesLongTime'] = "Esta operação poderá demorar. Deseja prosseguir?";
PMA_messages['strDropUserGroupWarning'] = "Deseja realmente eliminar o grupo de utilizadores \"%s\"?";
PMA_messages['strConfirmDeleteQBESearch'] = "Deseja realmente eliminar a pesquisa \"%s\"?";
PMA_messages['strConfirmNavigation'] = "Editou alguns dados e estes não foram guardados. Tem certeza que quer sair desta página antes de guardar as alterações?";
PMA_messages['strDropUserWarning'] = "Deseja realmente revogar o(s) utilizador(es) selecionado(s)?";
PMA_messages['strDeleteCentralColumnWarning'] = "Deseja realmente eliminar este coluna central?";
PMA_messages['strDropRTEitems'] = "Deseja realmente eliminar os itens selecionados?";
PMA_messages['strDropPartitionWarning'] = "Do you really want to DROP the selected partition(s)? This will also DELETE the data related to the selected partition(s)!";
PMA_messages['strTruncatePartitionWarning'] = "Do you really want to TRUNCATE the selected partition(s)?";
PMA_messages['strResetSlaveWarning'] = "Do you really want to RESET SLAVE?";
PMA_messages['strChangeColumnCollation'] = "This operation will attempt to convert your data to the new collation. In rare cases, especially where a character doesn\'t exist in the new collation, this process could cause the data to appear incorrectly under the new collation; in this case we suggest you revert to the original collation and refer to the tips at <a href=\"%s\" target=\"garbled_data_wiki\">Garbled Data</a>.<br/><br/>Are you sure you wish to change the collation and convert the data?";
PMA_messages['strChangeAllColumnCollationsWarning'] = "Through this operation, MySQL attempts to map the data values between collations. If the character sets are incompatible, there may be data loss and this lost data may <b>NOT</b> be recoverable simply by changing back the column collation(s).<b> To convert existing data, it is suggested to use the column(s) editing feature (the \"Change\" Link) on the table structure page. </b><br/><br/>Are you sure you wish to change all the column collations and convert the data?";
PMA_messages['strSaveAndClose'] = "Salvar & Fechar";
PMA_messages['strReset'] = "Limpa";
PMA_messages['strResetAll'] = "Redefinir Tudo";
PMA_messages['strFormEmpty'] = "Nº de dados insuficiente!";
PMA_messages['strRadioUnchecked'] = "Selecciona pelo menos uma das opções!";
PMA_messages['strEnterValidNumber'] = "Introduza um número válido!";
PMA_messages['strEnterValidLength'] = "Introduza um comprimento válido!";
PMA_messages['strAddIndex'] = "Add index";
PMA_messages['strEditIndex'] = "Edit index";
PMA_messages['strAddToIndex'] = "Adiciona %s coluna(s) ao Índice";
PMA_messages['strCreateSingleColumnIndex'] = "Criar índice de coluna única";
PMA_messages['strCreateCompositeIndex'] = "Criar índice composto";
PMA_messages['strCompositeWith'] = "Composto com:";
PMA_messages['strMissingColumn'] = "Seleciona a(s) coluna(s) para o índice.";
PMA_messages['strLeastColumnError'] = "Tem que adicionar pelo menos uma coluna.";
PMA_messages['strPreviewSQL'] = "Pré-visualização SQL";
PMA_messages['strSimulateDML'] = "Simular pesquisa";
PMA_messages['strMatchedRows'] = "Linhas que correspondem:";
PMA_messages['strSQLQuery'] = "Comando SQL:";
PMA_messages['strYValues'] = "Valores para Y";
PMA_messages['strHostEmpty'] = "O nome da máquina está vazio!";
PMA_messages['strUserEmpty'] = "O nome do utilizador está vazio!";
PMA_messages['strPasswordEmpty'] = "Indique a palavras-passe!";
PMA_messages['strPasswordNotSame'] = "As palavras-passe são diferentes!";
PMA_messages['strRemovingSelectedUsers'] = "Removendo os utilizadores seleccionados";
PMA_messages['strClose'] = "Fechar";
PMA_messages['strTemplateCreated'] = "Template was created.";
PMA_messages['strTemplateLoaded'] = "Template was loaded.";
PMA_messages['strTemplateUpdated'] = "Template was updated.";
PMA_messages['strTemplateDeleted'] = "Template was deleted.";
PMA_messages['strOther'] = "Outros";
PMA_messages['strThousandsSeparator'] = ",";
PMA_messages['strDecimalSeparator'] = ".";
PMA_messages['strChartConnectionsTitle'] = "Ligações / Processos";
PMA_messages['strIncompatibleMonitorConfig'] = "Configuração local do monitor incompatível!";
PMA_messages['strIncompatibleMonitorConfigDescription'] = "As configurações da tabela de armazenamento local do seu browser já não são compatíveis com a nova versão do monitor de diálogos. É provável que a sua configuração actual deixe de funcionar. Por favor, reinicie as suas configurações no menu <i>Configurações</i>.";
PMA_messages['strQueryCacheEfficiency'] = "Eficiência da cache de comandos";
PMA_messages['strQueryCacheUsage'] = "Utilização da cache de comandos";
PMA_messages['strQueryCacheUsed'] = "Cache de comandos utilizada";
PMA_messages['strSystemCPUUsage'] = "Uso da CPU do Sistema";
PMA_messages['strSystemMemory'] = "Memória do sistema";
PMA_messages['strSystemSwap'] = "Swap do sistema";
PMA_messages['strAverageLoad'] = "Carga média";
PMA_messages['strTotalMemory'] = "Memória total";
PMA_messages['strCachedMemory'] = "Memória na cache";
PMA_messages['strBufferedMemory'] = "Memória retida";
PMA_messages['strFreeMemory'] = "Memória livre";
PMA_messages['strUsedMemory'] = "Memória utilizada";
PMA_messages['strTotalSwap'] = "Total swap";
PMA_messages['strCachedSwap'] = "Cached swap";
PMA_messages['strUsedSwap'] = "Used swap";
PMA_messages['strFreeSwap'] = "Free swap";
PMA_messages['strBytesSent'] = "Bytes enviados";
PMA_messages['strBytesReceived'] = "Bytes recebidos";
PMA_messages['strConnections'] = "Ligações";
PMA_messages['strProcesses'] = "Processos";
PMA_messages['strB'] = "Bytes";
PMA_messages['strKiB'] = "KB";
PMA_messages['strMiB'] = "MB";
PMA_messages['strGiB'] = "GB";
PMA_messages['strTiB'] = "TB";
PMA_messages['strPiB'] = "PB";
PMA_messages['strEiB'] = "EB";
PMA_messages['strNTables'] = "%d tabela(s)";
PMA_messages['strQuestions'] = "Perguntas";
PMA_messages['strTraffic'] = "Tráfego";
PMA_messages['strSettings'] = "Configurações";
PMA_messages['strAddChart'] = "Adicionar gráfico a grelha";
PMA_messages['strAddOneSeriesWarning'] = "Adicione pelo menos uma variável à serie!";
PMA_messages['strNone'] = "Nenhum";
PMA_messages['strResumeMonitor'] = "Resumir o monitor";
PMA_messages['strPauseMonitor'] = "Pausar o monitor";
PMA_messages['strStartRefresh'] = "Iniciar atualização automática";
PMA_messages['strStopRefresh'] = "Parar atualização automática";
PMA_messages['strBothLogOn'] = "general_log e slow_query estão ativos.";
PMA_messages['strGenLogOn'] = "general_log está ativo.";
PMA_messages['strSlowLogOn'] = "slow_query_log está ativo.";
PMA_messages['strBothLogOff'] = "slow_query_log e general_log estão desativados.";
PMA_messages['strLogOutNotTable'] = "log_output não está configurado para TABELA.";
PMA_messages['strLogOutIsTable'] = "\"log_output\" está definido para a TABELA.";
PMA_messages['strSmallerLongQueryTimeAdvice'] = "slow_query_log está ativo, mas o servidor só regista comandos que demorem mais de %d segundos. É recomendado definir long_query_time para 0-2 segundos, dependendo do seu sistema.";
PMA_messages['strLongQueryTimeSet'] = "long_query_time está configurado para %d segundo(s).";
PMA_messages['strSettingsAppliedGlobal'] = "As seguintes configurações vão ser aplicadas globalmente e redefinidas para o valor padrão após o reinicio do servidor:";
PMA_messages['strSetLogOutput'] = "Define log_output como %s";
PMA_messages['strEnableVar'] = "Ativar %s";
PMA_messages['strDisableVar'] = "Desactivar %s";
PMA_messages['setSetLongQueryTime'] = "Definir \"long_query_time\" para %d segundos.";
PMA_messages['strNoSuperUser'] = "Não pode modificar estas variáveis. Por favor faça login como root ou contacte o seu administrador de base de dados.";
PMA_messages['strChangeSettings'] = "Modificar configurações";
PMA_messages['strCurrentSettings'] = "Configurações atuais";
PMA_messages['strChartTitle'] = "Chart title";
PMA_messages['strDifferential'] = "Diferencial";
PMA_messages['strDividedBy'] = "Dividido por %s";
PMA_messages['strUnit'] = "Unidade";
PMA_messages['strFromSlowLog'] = "Do registo lento";
PMA_messages['strFromGeneralLog'] = "Do registo geral";
PMA_messages['strServerLogError'] = "O nome da base de dados não é reconhecido por esta consulta nos registos do servidor.";
PMA_messages['strAnalysingLogsTitle'] = "A analisar os registos";
PMA_messages['strAnalysingLogs'] = "A analisar e a carregar registos. Isto pode demorar um um pouco.";
PMA_messages['strCancelRequest'] = "Cancelar pedido";
PMA_messages['strCountColumnExplanation'] = "Esta coluna mostra a quantidade de consultas idênticas que são agrupadas juntas. No entanto, apenas a consulta SQL em si foi usada como um critério de agrupamento, por isso os outros atributos de consultas, tais como horário de início, podem ser diferentes.";
PMA_messages['strMoreCountColumnExplanation'] = "Uma vez que o agrupamento de consultas INSERT foi selecionado, consultas INSERT na mesma tabela também são agrupadas juntas, independentemente dos dados inseridos.";
PMA_messages['strLogDataLoaded'] = "Dados do registo carregados. Comandos executados neste período de tempo:";
PMA_messages['strJumpToTable'] = "Saltar para a tabela de registos";
PMA_messages['strNoDataFoundTitle'] = "Dados não encontrados";
PMA_messages['strNoDataFound'] = "Registo analisado, mas não foram encontrados dados neste período de tempo.";
PMA_messages['strAnalyzing'] = "Em análise…";
PMA_messages['strExplainOutput'] = "Explicar SQL";
PMA_messages['strStatus'] = "Estado";
PMA_messages['strTime'] = "Tempo";
PMA_messages['strTotalTime'] = "Tempo Total:";
PMA_messages['strProfilingResults'] = "Resultado(s) da(s) consulta(s)";
PMA_messages['strTable'] = "Tabela";
PMA_messages['strChart'] = "Mapa de Resultados";
PMA_messages['strFiltersForLogTable'] = "Opções de filtragem da tabela de registos";
PMA_messages['strFilter'] = "Filtrar";
PMA_messages['strFilterByWordRegexp'] = "Filtrar comandos por palavra/regexp:";
PMA_messages['strIgnoreWhereAndGroup'] = "Agrupar comandos, ignorando dados variáveis em clausulas WHERE";
PMA_messages['strSumRows'] = "Soma de linhas agrupadas:";
PMA_messages['strTotal'] = "Total:";
PMA_messages['strLoadingLogs'] = "Carregando registos";
PMA_messages['strRefreshFailed'] = "Falhou a atualização do monitor";
PMA_messages['strInvalidResponseExplanation'] = "Ao pedir novos dados do gráfico o servidor retornou uma resposta inválida. Isto é provavelmente porque a sua sessão expirou. Atualizar a página e reinserir as suas credenciais deve ajudar.";
PMA_messages['strReloadPage'] = "Atualizar página";
PMA_messages['strAffectedRows'] = "Linhas afetadas:";
PMA_messages['strFailedParsingConfig'] = "Falha ao processar ficheiro de configuração. Não parece ser código JSON válido.";
PMA_messages['strFailedBuildingGrid'] = "Falha ao construir grelha do gráfico com a configuração importada. Redefinindo os valores padrão…";
PMA_messages['strImport'] = "Importar";
PMA_messages['strImportDialogTitle'] = "Importar configuração do monitor";
PMA_messages['strImportDialogMessage'] = "Seleccione o ficheiro que pretende importar.";
PMA_messages['strNoImportFile'] = "Não existem ficheiros disponíveis para importar no servidor!";
PMA_messages['strAnalyzeQuery'] = "Analyse query";
PMA_messages['strAdvisorSystem'] = "Sistema de Assessoria";
PMA_messages['strPerformanceIssues'] = "Possíveis problemas de desempenho";
PMA_messages['strIssuse'] = "Problemas";
PMA_messages['strRecommendation'] = "Recomendação";
PMA_messages['strRuleDetails'] = "Detalhes da regra";
PMA_messages['strJustification'] = "Justificação";
PMA_messages['strFormula'] = "Variável / formula utilizada";
PMA_messages['strTest'] = "Teste";
PMA_messages['strFormatting'] = "Formatando SQL…";
PMA_messages['strGo'] = "Executar";
PMA_messages['strCancel'] = "Cancelar";
PMA_messages['strPageSettings'] = "Page-related settings";
PMA_messages['strApply'] = "Aplicar";
PMA_messages['strLoading'] = "Carregando…";
PMA_messages['strAbortedRequest'] = "Pedido anulado!!";
PMA_messages['strProcessingRequest'] = "Processing request";
PMA_messages['strRequestFailed'] = "Request failed!!";
PMA_messages['strErrorProcessingRequest'] = "Erro ao processar pedido";
PMA_messages['strErrorCode'] = "Código de erro: %s";
PMA_messages['strErrorText'] = "Texto do erro: %s";
PMA_messages['strNoDatabasesSelected'] = "Nenhuma base de dados selecionada.";
PMA_messages['strDroppingColumn'] = "Apagando Coluna";
PMA_messages['strAddingPrimaryKey'] = "Adding primary key";
PMA_messages['strOK'] = "OK";
PMA_messages['strDismiss'] = "Clique para fechar esta notificação";
PMA_messages['strRenamingDatabases'] = "Renomeando Bases de Dados";
PMA_messages['strCopyingDatabase'] = "Copiando Base de Dados";
PMA_messages['strChangingCharset'] = "Changing charset";
PMA_messages['strNo'] = "Não";
PMA_messages['strForeignKeyCheck'] = "Enable foreign key checks";
PMA_messages['strErrorRealRowCount'] = "Falha na leitura do número real de linhas.";
PMA_messages['strSearching'] = "Pesquisando";
PMA_messages['strHideSearchResults'] = "Esconder resultados da pesquisa";
PMA_messages['strShowSearchResults'] = "Mostrar resultados da pesquisa";
PMA_messages['strBrowsing'] = "Navegação";
PMA_messages['strDeleting'] = "A Eliminar";
PMA_messages['MissingReturn'] = "A definição de uma função armazenada deve conter uma instrução RETURN!";
PMA_messages['strExport'] = "Exportar";
PMA_messages['enum_editor'] = "Editor ENUM/SET";
PMA_messages['enum_columnVals'] = "Valores para a coluna \"%s\"";
PMA_messages['enum_newColumnVals'] = "Valores para a nova coluna";
PMA_messages['enum_hint'] = "Introduza cada valor num campo separado.";
PMA_messages['enum_addValue'] = "Add %d valor(es)";
PMA_messages['strImportCSV'] = "Nota: Se o arquivo contém várias tabelas, estas serão combinadas numa.";
PMA_messages['strHideQueryBox'] = "Esconder Caixa do query";
PMA_messages['strShowQueryBox'] = "Mostrar Caixa do query";
PMA_messages['strEdit'] = "Edita";
PMA_messages['strDelete'] = "Apagar";
PMA_messages['strNotValidRowNumber'] = "%d não é um número de linha válido.";
PMA_messages['strBrowseForeignValues'] = "Visualizar valores estrangeiros";
PMA_messages['strNoAutoSavedQuery'] = "No auto-saved query";
PMA_messages['strBookmarkVariable'] = "Variável %d:";
PMA_messages['pickColumn'] = "Selecione";
PMA_messages['pickColumnTitle'] = "Selector de colunas";
PMA_messages['searchList'] = "Pesquisar nesta lista";
PMA_messages['strEmptyCentralList'] = "Não existem colunas na lista central. Assegure-se de que a lista de colunas central para a base de dados %s contém colunas que não estão presentes na tabela corrente.";
PMA_messages['seeMore'] = "Ver mais";
PMA_messages['confirmTitle'] = "Tem a certeza?";
PMA_messages['makeConsistentMessage'] = "Esta acção pode modificar as definições de algumas colunas\n<br/>Tem a certeze que quer continuar?";
PMA_messages['strContinue'] = "Continuar";
PMA_messages['strAddPrimaryKey'] = "Adicionar chave primária";
PMA_messages['strPrimaryKeyAdded'] = "Chave primária adicionada.";
PMA_messages['strToNextStep'] = "Continuando para a próxima forma…";
PMA_messages['strFinishMsg'] = "A primeira forma de normalização da tabela \'%s\' foi concluída.";
PMA_messages['strEndStep'] = "Fim da forma de normalização";
PMA_messages['str2NFNormalization'] = "Segunda forma de normalização (2NF)";
PMA_messages['strDone'] = "Concluído";
PMA_messages['strConfirmPd'] = "Confirme as dependências parciais";
PMA_messages['strSelectedPd'] = "Dependênciais parciais selecionadas:";
PMA_messages['strPdHintNote'] = "Nota: a, b -> d,f implica que os valores das colunas a e b combinadas podem determinar os valores das colunas d e f.";
PMA_messages['strNoPdSelected'] = "Nenhuma dependência parcial selecionada!";
PMA_messages['strBack'] = "Voltar";
PMA_messages['strShowPossiblePd'] = "Mostrar possíveis dependênciais parciais baseando nos dados da tabela";
PMA_messages['strHidePd'] = "Ocultar lista de dependências parciais";
PMA_messages['strWaitForPd'] = "Aguarde uns instantes! Isto poderá demorar alguns segundos dependendo do tamanho dos dados e do número de colunas da tabela.";
PMA_messages['strStep'] = "Passo";
PMA_messages['strMoveRepeatingGroup'] = "<ol><b>As seguintes ações serão executadas:</b><li>DROP colunas %s da tabela %s</li><li>Criar a próxima tabela</li>";
PMA_messages['strNewTablePlaceholder'] = "Enter new table name";
PMA_messages['strNewColumnPlaceholder'] = "Enter column name";
PMA_messages['str3NFNormalization'] = "Terceira forma de normalização (3NF)";
PMA_messages['strConfirmTd'] = "Confirm transitive dependencies";
PMA_messages['strSelectedTd'] = "Dependências selecionadas:";
PMA_messages['strNoTdSelected'] = "Nenhuma dependência selecionada!";
PMA_messages['strSave'] = "Guarda";
PMA_messages['strHideSearchCriteria'] = "Esconder critérios de buca";
PMA_messages['strShowSearchCriteria'] = "Mostrar critérios de busca";
PMA_messages['strRangeSearch'] = "Range search";
PMA_messages['strColumnMax'] = "Máximo de colunas:";
PMA_messages['strColumnMin'] = "Mínimo de colunas:";
PMA_messages['strMinValue'] = "Valor mínimo:";
PMA_messages['strMaxValue'] = "Valor máximo:";
PMA_messages['strHideFindNReplaceCriteria'] = "Esconder critérios de localizar e substituir";
PMA_messages['strShowFindNReplaceCriteria'] = "Mostrar critérios de localizar e substituir";
PMA_messages['strDisplayHelp'] = "<ul><li>Cada ponto representa um registo (linha) de dados.</li><li>Colocar o cursor por cima de um ponto irá mostrar a sua legenda.</li><li>Para ampliar, selecione uma area do gráfico com o rato.</li><li>Clique no botão Reset Zoom para voltar ao estado original.</li><li>Clique num ponto de dados para ver e possivelmente editar a linha de dados.</li><li>O plano pode ser redimensionado arrastando-o ao longo do canto inferior direito.</li></ul>";
PMA_messages['strHelpTitle'] = "Zoom search instructions";
PMA_messages['strInputNull'] = "<strong>Seleccione duas colunas</strong>";
PMA_messages['strSameInputs'] = "<strong>Seleccione duas colunas diferentes</strong>";
PMA_messages['strDataPointContent'] = "Conteúdo do ponto de dados";
PMA_messages['strIgnore'] = "Ignora";
PMA_messages['strCopy'] = "Copiar";
PMA_messages['strX'] = "X";
PMA_messages['strY'] = "Y";
PMA_messages['strPoint'] = "Ponto";
PMA_messages['strPointN'] = "Ponto %d";
PMA_messages['strLineString'] = "Segmento de Reta";
PMA_messages['strPolygon'] = "Polígono";
PMA_messages['strGeometry'] = "Geometria";
PMA_messages['strInnerRing'] = "Inner ring";
PMA_messages['strOuterRing'] = "Outer ring";
PMA_messages['strAddPoint'] = "Adicionar um ponto";
PMA_messages['strAddInnerRing'] = "Adicionar um anel interior";
PMA_messages['strYes'] = "Sim";
PMA_messages['strCopyEncryptionKey'] = "Deseja copiar a chave de encriptação?";
PMA_messages['strEncryptionKey'] = "Chave de encriptação";
PMA_messages['strLockToolTip'] = "Indica que foram feitas mudanças nesta página; Será pedida confirmação antes de abandonar as mudanças";
PMA_messages['strSelectReferencedKey'] = "Seleccione chave de referencia";
PMA_messages['strSelectForeignKey'] = "Seleccione Foreign Key";
PMA_messages['strPleaseSelectPrimaryOrUniqueKey'] = "Seleccione a chave primária ou uma chave única!";
PMA_messages['strChangeDisplay'] = "Escolha a coluna para mostrar";
PMA_messages['strLeavingDesigner'] = "Não salvou as mudanças no layout. Estas serão perdidas se não as guardar. Deseja continuar?";
PMA_messages['strPageName'] = "Nome da página";
PMA_messages['strSavePage'] = "Guardar página";
PMA_messages['strSavePageAs'] = "Salvar página como";
PMA_messages['strOpenPage'] = "Abrir página";
PMA_messages['strDeletePage'] = "Eliminar página";
PMA_messages['strUntitled'] = "Sem título";
PMA_messages['strSelectPage'] = "Selecione uma página para continuar";
PMA_messages['strEnterValidPageName'] = "Introduza um nome de página válido";
PMA_messages['strLeavingPage'] = "Deseja guardar as alterações à página atual?";
PMA_messages['strSuccessfulPageDelete'] = "Página eliminada com sucesso";
PMA_messages['strExportRelationalSchema'] = "Exporta o esquema relacional (schema)";
PMA_messages['strModificationSaved'] = "Modificações foram guardadas";
PMA_messages['strAddOption'] = "Adiciona uma opção para a coluna \"%s\".";
PMA_messages['strObjectsCreated'] = "%d objecto(s) criado(s).";
PMA_messages['strSubmit'] = "Submete";
PMA_messages['strCellEditHint'] = "Carregue em ESC para cancelar a edição.";
PMA_messages['strSaveCellWarning'] = "Editou alguns dados e estes não foram salvos. Tem certeza que quer sair desta página antes de salvar os seus dados?";
PMA_messages['strColOrderHint'] = "Arraste para re-ordenar.";
PMA_messages['strSortHint'] = "Clica para ordenar resultados por esta coluna.";
PMA_messages['strMultiSortHint'] = "Shift+Click to add this column to ORDER BY clause or to toggle ASC/DESC.<br />- Ctrl+Click or Alt+Click (Mac: Shift+Option+Click) to remove column from ORDER BY clause";
PMA_messages['strColMarkHint'] = "Clique para seleccionar/rejeitar.";
PMA_messages['strColNameCopyHint'] = "Duplo-clique para copiar o nome da coluna.";
PMA_messages['strColVisibHint'] = "Clique na seta<br />para alternar a visibilidade da coluna.";
PMA_messages['strShowAllCol'] = "Mostrar tudo";
PMA_messages['strAlertNonUnique'] = "Esta tabela não contém uma coluna exclusiva. Funções relacionados com a edição da tabela, checkbox, Editar, Copiar e Eliminar links podem não funcionar depois de guardar.";
PMA_messages['strEnterValidHex'] = "Por favor introduza uma cadeia hexadecimal válida. Os caracteres válidos são 0-9, A-F.";
PMA_messages['strShowAllRowsWarning'] = "Deseja realmente ver todas as linhas? Grandes tabelas poderão crashar o navegador.";
PMA_messages['strOriginalLength'] = "Original length";
PMA_messages['dropImportMessageCancel'] = "cancelar";
PMA_messages['dropImportMessageAborted'] = "Abortado";
PMA_messages['dropImportMessageFailed'] = "Falhou";
PMA_messages['dropImportMessageSuccess'] = "Sucesso";
PMA_messages['dropImportImportResultHeader'] = "Importar estado";
PMA_messages['dropImportDropFiles'] = "Largue ficheiros aqui";
PMA_messages['dropImportSelectDB'] = "Primeiro selecione a base de dados";
PMA_messages['strGridEditFeatureHint'] = "Também pode editar a maioria dos valores<br />com um duplo clique no valor a alterar.";
PMA_messages['strGoToLink'] = "Ir para link:";
PMA_messages['strColNameCopyTitle'] = "Copiar nome da coluna.";
PMA_messages['strColNameCopyText'] = "Clique com o botão direito do rato para copiar para a área de transferência.";
PMA_messages['strGeneratePassword'] = "Gerar palavra-passe";
PMA_messages['strGenerate'] = "Gerar";
PMA_messages['strChangePassword'] = "Alterar a palavra-passe";
PMA_messages['strMore'] = "Mais";
PMA_messages['strShowPanel'] = "Show panel";
PMA_messages['strHidePanel'] = "Hide panel";
PMA_messages['strUnhideNavItem'] = "Mostrar items de navegação escondidos da árvore.";
PMA_messages['linkWithMain'] = "Conectar com o painel principal";
PMA_messages['unlinkWithMain'] = "Desconectar do painel principal";
PMA_messages['strHoverDbFastFilter'] = "To filter all databases on server, press Enter after a search term";
PMA_messages['strHoverFastFilter'] = "To filter all %s in database, press Enter after a search term";
PMA_messages['strTables'] = "Tabelas";
PMA_messages['strViews'] = "views";
PMA_messages['strProcedures'] = "procedures";
PMA_messages['strEvents'] = "events";
PMA_messages['strFunctions'] = "Funções";
PMA_messages['strInvalidPage'] = "A página requisitada não foi encontrada no histórico, pode ter expirado.";
PMA_messages['strNewerVersion'] = "Uma nova versão do phpMyAdmin está disponível e deverá proceder à actualização. A nova versão é %s, e foi lançada em %s.";
PMA_messages['strLatestAvailable'] = ", última versão estável:";
PMA_messages['strUpToDate'] = "até à data";
PMA_messages['strCreateView'] = "Criar visualização";
PMA_messages['strSendErrorReport'] = "Enviar relatório de erro";
PMA_messages['strSubmitErrorReport'] = "Submit error report";
PMA_messages['strErrorOccurred'] = "Ocorreu um erro fatal de JavaScript. Pretende enviar um relatório de erro?";
PMA_messages['strChangeReportSettings'] = "Change report settings";
PMA_messages['strShowReportDetails'] = "Show report details";
PMA_messages['strTimeOutError'] = "Exportação incompleta devido a um limite de tempo de execução baixo a nível do PHP!";
PMA_messages['strTooManyInputs'] = "Aviso: um formulário desta página tem mais que %d campos. Ao submeter, alguns dos campos podem ser ignorados, devido à configuração do PHP max_input_vars.";
PMA_messages['phpErrorsFound'] = "<div class=\"error\">Foram detectados alguns erros no servidor!<br/>Por favor olhe para a parte inferior desta janela.<div><input id=\"pma_ignore_errors_popup\" type=\"submit\" value=\"Ignora\" class=\"floatright\" style=\"margin-top: 20px;\"><input id=\"pma_ignore_all_errors_popup\" type=\"submit\" value=\"Ignorar tudo\" class=\"floatright\" style=\"margin-top: 20px;\"></div></div>";
PMA_messages['phpErrorsBeingSubmitted'] = "<div class=\"error\">Foram detectados alguns erros no servidor!<br/>As suas definições estão agora a ser submetidas, por favor aguarde.<br/><img src=\"./themes/pmahomme/img/ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\"/></div>";
PMA_messages['strConsoleRequeryConfirm'] = "Executar consulta novamente?";
PMA_messages['strConsoleDeleteBookmarkConfirm'] = "Deseja realmente eliminar este marcador?";
PMA_messages['strConsoleDebugError'] = "Some error occurred while getting SQL debug info.";
PMA_messages['strConsoleDebugSummary'] = "%s queries executed %s times in %s seconds.";
PMA_messages['strConsoleDebugArgsSummary'] = "%s argument(s) passed";
PMA_messages['strConsoleDebugShowArgs'] = "Show arguments";
PMA_messages['strConsoleDebugHideArgs'] = "Hide arguments";
PMA_messages['strConsoleDebugTimeTaken'] = "Time taken:";
PMA_messages['strNoLocalStorage'] = "There was a problem accessing your browser storage, some features may not work properly for you. It is likely that the browser doesn\'t support storage or the quota limit has been reached. In Firefox, corrupted storage can also cause such a problem, clearing your \"Offline Website Data\" might help. In Safari, such problem is commonly caused by \"Private Mode Browsing\".";
var themeCalendarImage = './themes/pmahomme/img/b_calendar.png';
var pmaThemeImage = './themes/pmahomme/img/';
var mysql_doc_template = './url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2F%25s.html';
var maxInputVars = 1000;
if ($.datepicker) {
$.datepicker.regional['']['closeText'] = "Concluído";
$.datepicker.regional['']['prevText'] = "Ant";
$.datepicker.regional['']['nextText'] = "Próx";
$.datepicker.regional['']['currentText'] = "Hoje";
$.datepicker.regional['']['monthNames'] = ["Janeiro","Fevereiro","Março","Abril","Mai","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro",];
$.datepicker.regional['']['monthNamesShort'] = ["Jan","Fev","Mar","Abr","Maio","Jun","Jul","Ago","Set","Out","Nov","Dez",];
$.datepicker.regional['']['dayNames'] = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado",];
$.datepicker.regional['']['dayNamesShort'] = ["Domingo","Seg","Ter","Qua","Qui","Sex","Sab",];
$.datepicker.regional['']['dayNamesMin'] = ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb",];
$.datepicker.regional['']['weekHeader'] = "Sem";
$.datepicker.regional['']['showMonthAfterYear'] = false;
$.datepicker.regional['']['yearSuffix'] = "Nenhum";
$.extend($.datepicker._defaults, $.datepicker.regional['']);
} /* if ($.datepicker) */

if ($.timepicker) {
$.timepicker.regional['']['timeText'] = "Tempo";
$.timepicker.regional['']['hourText'] = "Hora";
$.timepicker.regional['']['minuteText'] = "Minuto";
$.timepicker.regional['']['secondText'] = "Segundo";
$.extend($.timepicker._defaults, $.timepicker.regional['']);
} /* if ($.timepicker) */

function extendingValidatorMessages() {
$.extend($.validator.messages, {
required: "This field is required", remote: "Please fix this field", email: "Please enter a valid email address", url: "Please enter a valid URL", date: "Please enter a valid date", dateISO: "Please enter a valid date ( ISO )", number: "Please enter a valid number", creditcard: "Please enter a valid credit card number", digits: "Please enter only digits", equalTo: "Please enter the same value again", maxlength: $.validator.format("Please enter no more than {0} characters"), minlength: $.validator.format("Please enter at least {0} characters"), rangelength: $.validator.format("Please enter a value between {0} and {1} characters long"), range: $.validator.format("Please enter a value between {0} and {1}"), max: $.validator.format("Please enter a value less than or equal to {0}"), min: $.validator.format("Please enter a value greater than or equal to {0}"), validationFunctionForDateTime: $.validator.format("Please enter a valid date or time"), validationFunctionForHex: $.validator.format("Please enter a valid HEX input"), validationFunctionForFuns: $.validator.format("Erro")
});
} /* if ($.validator) */