import { TestBed } from '@angular/core/testing';

import { AlunoSelecionadoService } from './aluno-selecionado.service';

describe('AlunoSelecionadoService', () => {
  let service: AlunoSelecionadoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AlunoSelecionadoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
