export type User = {
    id: number
    name: string
    email: string
    is_aluno: boolean
    is_homologador: boolean
}

type Aluno = {
    id: number
    certificados: Certificado[]
    user: User
}

type Certificado = {
    id: number
    nome: string
    horas: number
    homologacao: Homologacao
    tipo_certificado: TipoCertificado
}

type TipoCertificado = {
    id: number
    tipo: string
}

type Homologacao = {
    id: number
    updated_at: string
    horas: number
    status: 'iniciado' | 'homologado' | 'negado'
    homologador_id: number
}